<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\LogPrint;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PrintActionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $deposits = [];
        if(LogPrint::all()->count() != 0){
            $deposits = Deposit::select('deposits.id', 'deposits.code', 'deposits.client_id', 'deposits.deposit_date', 'deposits.retrieve_date', 'users.fullname as user', 'clients.fullname as client', DB::raw('COUNT(log_prints.deposit_id) as code_count'))
                ->join('log_prints', 'deposits.id', '=', 'log_prints.deposit_id')
                ->join('users', 'users.id', '=', 'deposits.user_id')
                ->join('clients', 'clients.id', '=', 'deposits.client_id')
                ->whereNull('deposits.deleted_at')
                ->groupBy('deposits.id', 'deposits.code', 'deposits.client_id', 'deposits.deposit_date', 'deposits.retrieve_date', 'users.fullname', 'clients.fullname')
                ->get();

        }

        return view('print.index', compact('deposits'));
    }

    public function destroy(Request $request){
        $log = LogPrint::find($request->id);
        $log->delete();
        return redirect()->route('logs.index')
            ->with('success',
             'Log supprimé!');
    }

    public function logPrintAction(Request $request)
    {
        $logPrint = new LogPrint();
        $logPrint->user_id = Auth::user()->id;
        $logPrint->deposit_id = $request->deposit_id;
        $logPrint->save();
        Log::info('Action d\'impression détectée.');
        return response()->json(['success' => true]);
    }

    public function print_per_deposit($id){
        $prints = LogPrint::where('deposit_id', $id)->get();
        $details = [];
        foreach($prints as $print){
            $user = User::find($print->user_id);
            $action_date = $print->created_at;
            $details[] = ['user' => $user->fullname, 'action_date' => date_format($action_date,"d-m-Y H:i:s")];
        }

        return response()->json(['success' => true, 'details' => $details]);
    }

    public function search(Request $request){
        return view('print.search');
    }

    public function search_log(Request $request){

        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();



        if (($date_debut != '') && ($date_fin != '')) {

            $deposits = [];
            if(LogPrint::all()->count() != 0){
                $deposits = Deposit::select('deposits.id', 'deposits.code', 'deposits.client_id', 'deposits.deposit_date', 'deposits.retrieve_date', 'users.fullname as user', 'clients.fullname as client', DB::raw('COUNT(log_prints.deposit_id) as code_count'))
                    ->join('log_prints', 'deposits.id', '=', 'log_prints.deposit_id')
                    ->whereDate('log_prints.created_at', '<=' , $date_fin)
                    ->whereDate('log_prints.created_at', '>=' , $date_debut)
                    ->join('users', 'users.id', '=', 'deposits.user_id')
                    ->join('clients', 'clients.id', '=', 'deposits.client_id')
                    ->whereNull('deposits.deleted_at')
                    ->groupBy('deposits.id', 'deposits.code', 'deposits.client_id', 'deposits.deposit_date', 'deposits.retrieve_date', 'users.fullname', 'clients.fullname')
                    ->get();

            }


            $beginDate = $request->date_debut;
            $endDate=$request->date_fin;

            return view('print.result', compact('beginDate', 'endDate', 'deposits'));
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Agency;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function searchReceipt()
    {
        return view('receipts.search');
    }

    public function receipeNewToDay()
    {
        $total=0;
        $countArticles = 0;
        $todayStart = Carbon::now()->startOfDay();
        $todayEnd = Carbon::now()->endOfDay();

        $deposits = [];
        $transactions = Transaction::where('transaction_date', '=', Carbon::now()->format('Y-m-d'))->where('amount', '>', 0)->get();
        // dd($transactions);
        foreach($transactions as $trans){
            if($trans->deposit()->agency_id == Auth::user()->agency_id){
                array_push($deposits, $trans->deposit());
                $total+=$trans->amount;
                $countArticles+=$trans->deposit()->nbr_articles();
            }
        }
        // dd($transactions);
        // foreach($transactions as $trans){
        //     if($trans->deposit()->agency_id == Auth::user()->agency_id){
        //         array_push($deposits, $trans->deposit());
        //         $total+=$trans->amount;
        //         $countArticles+=$trans->deposit()->nbr_articles();
        //     }
        // }
        $users = Agency::find(Auth::user()->agency_id)->users();
        return view('receipts.receipeNewToDay', compact('deposits', 'total', 'countArticles', 'users'));
    }


    public function receipeAllToDay()
    {
        $totalAdvanced = 0;
        $totalDiscount= 0;
        $totalRest = 0;
        $total = 0;
        $countArticles = 0;


        $deposits = [];
        $transactions = Transaction::where('transaction_date', Carbon::now()->format('Y-m-d'))->where('amount', '>', 0)->get();
        foreach($transactions as $trans){

            if($trans->deposit()->agency_id == Auth::user()->agency_id){
                array_push($deposits, $trans->deposit());
                $total+=$trans->amount;
                $countArticles+=$trans->deposit()->nbr_articles();
                $totalAdvanced += $trans->deposit()->advanced;
                $totalDiscount += $trans->deposit()->discount;
                $totalRest += $trans->deposit()->total - $trans->deposit()->advanced - $trans->deposit()->discount;
                $total += $trans->deposit()->total;
            }

            //
        }

        return view('receipts.receipeAllToDay', compact('deposits', 'totalAdvanced', 'totalDiscount', 'totalRest', 'total'));
    }

    public function searchLeftpay()
    {
        return view('receipts.searchleftpay');
    }

    public function getReceipt()
    {
        return view('receipts.index');
    }

    public function getLeftpay()
    {
        return view('receipts.resultsLeftpay');
    }

    public function postReceipt(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));

        $total=0;

        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::select('deposits.*')
                                   // ->whereBetween('created_at', [$date_debut, $date_fin])
                                   ->whereDate('retrieve_date', '>=' , $date_debut)
                                   ->whereDate('retrieve_date', '<=' , $date_fin)
                                    ->where('total', '=', 0)
                                    ->where('status', '=', 0)
                                    ->where('agency_id', '=', Auth::user()->agency_id)
                                    ->get();

            foreach($deposits as $deposit){
                $total += $deposit->total;
            }

                return view('receipts.index', compact('deposits', 'total'));
        }
    }


    public function postLeftpay(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();
        $total=0;

        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::select('deposits.*')
                                    //->whereBetween('created_at', [$date_debut, $date_fin])
                                    ->whereDate('created_at', '>=' , $date_debut)
                                    ->whereDate('created_at', '<=' , $date_fin)
                                    ->where('total', '>', 0)
                                    ->where('agency_id', '=', Auth::user()->agency_id)
                                    ->where('status', '=', 0)
                                    ->get();

            $all_deposits = [];

            foreach($deposits as $deposit){
                if($deposit->total - $deposit->discount > $deposit->total_paid()){
                    array_push($all_deposits, $deposit);
                }
            }

            foreach($all_deposits as $deposit){
                $total += $deposit->total;
            }

                return view('receipts.resultsLeftpay', compact('all_deposits', 'total'));
        }
    }
}

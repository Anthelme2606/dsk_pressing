<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Deposit;
use App\Models\Client;
use App\Models\Transaction;
use App\Models\DepositUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\InOut;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stats.search');
    }

    public function getSearch()
    {
        return view('stats.index');
    }

    public function range()
    {
        return view('stats.range');
    }

    public function sendData(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();

        $totalAdvanced = 0;
        $totalDiscount = 0;
        $totalRest = 0;
        $totalnet = 0;
        $total = 0;
        $nbre = 0;
        $nbr_articles = 0;

        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::whereDate('created_at', '>=' , $date_debut)
                                   ->whereDate('created_at', '<=' , $date_fin)
                                   ->where('agency_id', '=', Auth::user()->agency_id)
                                   ->orderBy('total', 'desc')
                                   ->get();

            foreach($deposits as $deposit){

                $totalAdvanced += $deposit->advanced;
                $totalDiscount += $deposit->discount;
                $totalRest += $deposit->total - $deposit->advanced;
                $totalnet += $deposit->total + $deposit->discount;
                $total += $deposit->total;
                $nbre ++;
                $depositedarticles = DB::table('deposit_units')
                ->where('client_id', '=', $deposit->client_id)
                ->where('deposit_id', '=', $deposit->id)
                ->get();
                foreach ($depositedarticles as $depot){
                    $nbr_articles += $depot->quantity;

                }
                }

                return view('stats.response', compact('deposits', 'total', 'totalAdvanced', 'totalRest', 'totalnet', 'totalDiscount'));
        }
    }
    public function getRatioClient()
    {
        return view('stats.bestclient.index');
    }

    public function request_client(Request $request){

        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();


        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::whereDate('created_at', '>=' , $date_debut)
                                   ->whereDate('created_at', '<=' , $date_fin)
                                   ->where('agency_id', '=', Auth::user()->agency_id)
                                   ->orderBy('total', 'desc')
                                   ->get();
            $groupedDeposits = $deposits->groupBy('client_id');

            $result = [];

            foreach ($groupedDeposits as $clientId => $clientDeposits) {
                $totalAmount = $clientDeposits->sum('total');

                $result[] = [
                    'client_id' => $clientId,
                    'client' => Client::find($clientId)->fullname,
                    'client_tel' => Client::find($clientId)->phone_number,
                    'nb_depot' => count($clientDeposits),
                    'total_amount' => $totalAmount,
                    // 'deposits' => $clientDeposits,
                ];
            }
            $result = $this->sortResultByTotalAmount($result, 'desc');

            return view('stats.bestclient.list', compact('result', 'date_debut', 'date_fin'));
        }

    }

    public function sortResultByTotalAmount($result, $order = 'asc') {
        usort($result, function ($a, $b) use ($order) {
            $comparison = ($order === 'asc') ? 1 : -1;
            return $comparison * ($a['total_amount'] - $b['total_amount']);
        });

        return $result;
    }

    public function show_deposits(Request $request, $client_id, $date_debut, $date_fin){


        $date_debut = Carbon::parse($date_debut);
        $date_fin = Carbon::parse($date_fin);
        $date = Carbon::now()->toDateString();

        $totalAdvanced = 0;
        $totalDiscount = 0;
        $totalRest = 0;
        $totalnet = 0;
        $total = 0;
        $nbre = 0;
        $nbr_articles = 0;

        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::whereDate('created_at', '>=' , $date_debut)
                                    ->whereDate('created_at', '<=' , $date_fin)
                                    ->where('client_id', '=', $client_id)
                                    ->where('agency_id', '=', Auth::user()->agency_id)
                                    ->orderBy('total', 'desc')
                                    ->get();


            foreach($deposits as $deposit){

                $totalAdvanced += $deposit->advanced;
                $totalDiscount += $deposit->discount;
                $totalRest += $deposit->total - $deposit->advanced;
                $totalnet += $deposit->total + $deposit->discount;
                $total += $deposit->total;
                $nbre ++;
                $depositedarticles = DB::table('deposit_units')
                ->where('client_id', '=', $deposit->client_id)
                ->where('deposit_id', '=', $deposit->id)
                ->get();
                foreach ($depositedarticles as $depot){
                    $nbr_articles += $depot->quantity;

                }
            }
            $beginDate = $date_debut;
            $endDate= $date_fin;

            return view('stats.bestclient.show_deposits', compact('deposits', 'total', 'totalAdvanced', 'totalRest', 'totalnet', 'totalDiscount', 'beginDate', 'endDate'));
        }
    }

    public function postSearch(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();

        $totalAdvanced = 0;
        $totalDiscount = 0;
        $totalRest = 0;
        $totalnet = 0;
        $total = 0;
        $totalTransaction = 0;
        $countArticles = 0;
        $nbre = 0;
        $nbr_articles = 0;

        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::whereDate('created_at', '>=' , $date_debut)
                                   ->whereDate('created_at', '<=' , $date_fin)
                                   ->where('agency_id', '=', Auth::user()->agency_id)
                                   ->get();

            foreach($deposits as $deposit){

                $totalAdvanced += $deposit->advanced;
                $totalDiscount += $deposit->discount;
                $totalRest += $deposit->total - $deposit->advanced;
                $totalnet += $deposit->total + $deposit->discount;
                $total += $deposit->total;
                $nbre ++;
                $depositedarticles = DB::table('deposit_units')
                ->where('client_id', '=', $deposit->client_id)
                ->where('deposit_id', '=', $deposit->id)
                ->get();
                foreach ($depositedarticles as $depot){
                    $nbr_articles += $depot->quantity;

                }
            }


            $transactions = Transaction::whereDate('transaction_date', '>=' , $date_debut)->whereDate('transaction_date', '<=' , $date_fin)->get();
            foreach($transactions as $trans){

                if($trans->deposit()->agency_id == Auth::user()->agency_id){
                    $totalTransaction+=$trans->amount;
                    $countArticles+=$trans->deposit()->nbr_articles();
                }

                //
            }
                $beginDate = $request->date_debut;
                $endDate=$request->date_fin;

                return view('stats.index', compact('deposits', 'total', 'totalAdvanced', 'totalRest', 'totalnet', 'totalDiscount', 'beginDate', 'endDate', 'totalTransaction', 'nbr_articles'));
            }
    }

    public function totake()
    {
        $date = Carbon::now()->toDateString();
        return view('stats.totake',compact('date'));
    }

    public function getTotake()
    {
        return view('stats.answers');
    }

    public function postTotake(Request $request)
    {
        $this->validate($request, [
            'date_totake' => 'required',
        ]);


        $total = 0;
        $nbr_articles = 0;

        $date_totake = $request->input('date_totake');
        $deposits = Deposit::where('instant_retrieve', '=', $date_totake)->where('agency_id', '=', Auth::user()->agency_id)->get();
        //return view('stats.answer', compact('deposits'));
        foreach($deposits as $deposit){
            $nbr_articles += $deposit->nbr_articles();
            $transactions = Transaction::where('deposit_id', $deposit->id)->where("transaction_date", $date_totake)->get();
            foreach($transactions as $transaction){
                $total += $transaction->amount;
            }


        }

        // dd($deposits);

        // if ($deposits) {

        //     foreach($deposits as $deposit){

        //         $totalAdvanced += $deposit->advanced;
        //         $totalDiscount += $deposit->discount;
        //         $totalRest += $deposit->total - $deposit->advanced;
        //         $totalnet += $deposit->total + $deposit->discount;
        //         // $total += $deposit->total;
        //         $nbre ++;
        //         $depositedarticles = DB::table('deposit_units')
        //         ->where('client_id', '=', $deposit->client_id)
        //         ->where('deposit_id', '=', $deposit->id)
        //         ->get();
        //         foreach ($depositedarticles as $depot){
        //             $nbr_articles += $depot->quantity;

        //         }
        //         }
        //     return view('stats.answers', compact('deposits','nbre','deposits', 'total','totalAdvanced','totalDiscount', 'totalRest', 'totalnet', 'nbr_articles'));

        // }
        return view('stats.answers', compact('deposits', 'total', 'nbr_articles', 'date_totake'));
        // return view('stats.answers')->with('error');
    }

    public function search(Request $request){
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('customer');
            if($query != '')
            {
                $data = DB::table('clients')
                    ->orWhere('fullname', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orWhere('phone_number', 'like', '%'.$query.'%')
                    ->orWhere('address', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();

            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '<li>'.$row->fullname.'</li>';
                }
            } else {
                $output .= '<li>'.'Aucun client trouvé'.'</li>';
            }

            return $output;
        }

    }

    public function getCustomerDeposit()
    {
        return view('stats.customer');
    }

    public function postCustomerDeposit(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $customer_id = $request->input('customer_id');
        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();

        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::where('client_id', '=', $customer_id)
                                    //->whereBetween('created_at', [$date_debut, $date_fin])
                                    ->whereDate('created_at', '>=' , $date_debut)
                                    ->whereDate('created_at', '<=' , $date_fin)
                                    ->where('agency_id', '=', Auth::user()->agency_id)
                                    ->orderBy('id', 'desc')
                                    ->get();

            return view('stats.customerDeposits', compact('deposits'));
        }
        //return view('stats.customerDeposits');
    }

    public function getSaleDay()
    {
        $date_now = Carbon::now()->toDateTimeString();
        $date = Carbon::now()->subDays(1)->toDateTimeString();
        $totalAdvanced = 0;
        $totalDiscount = 0;
        $totalRest = 0;
        $totalnet = 0;
        $total = 0;
        $nbre = 0;
        $countArticles = 0;
        $nbr_articles= 0;
        $in_price = 0;
        $out_price = 0;
        //dd($date);
        $deposits = Deposit::where('deposit_date', '>=', Carbon::now()->format('Y-m-d'))
                            ->where("agency_id", Auth::user()->agency_id)
                            ->get();
        $in_outs = InOut::where('action_date', '>=', Carbon::now()->format('Y-m-d'))
                            ->where('agency_id', '=', Auth::user()->agency_id)
                            ->where('status', '=', true)
                            ->get();

        foreach($in_outs as $in_out){
            if($in_out->type=="in" ){
                $in_price += $in_out->montant;
            } else {
                $out_price += $in_out->montant;
            }
        }
        foreach($deposits as $deposit){
            $depositUnits = DepositUnit::where('deposit_id', $deposit->id)
                            ->get();
            if($depositUnits){
                foreach($depositUnits as $unit){
                    $countArticles += $unit->quantity;
                }
            }

            $totalAdvanced += $deposit->advanced;
            $totalDiscount += $deposit->discount;
            $totalRest += $deposit->total - $deposit->advanced - $deposit->discount;
            $totalnet += $deposit->total + $deposit->discount;
            $total += $deposit->total;
            // $total += $deposit->amount_paid;
            $nbre ++;
            $depositedarticles = DB::table('deposit_units')
            ->where('client_id', '=', $deposit->client_id)
            ->where('deposit_id', '=', $deposit->id)
            ->get();
            foreach ($depositedarticles as $depot){
                $nbr_articles += $depot->quantity;

            }
        }
        return view('stats.saleday', compact('date_now','date','nbre','deposits', 'total','totalAdvanced','totalDiscount', 'totalRest', 'totalnet', "countArticles", 'nbr_articles', 'in_price', 'out_price'));
    }

    public function getSaleByCasheer($id){
        $date_now = Carbon::now()->toDateTimeString();
        $date = Carbon::now()->subDays(1)->toDateTimeString();
        $totalAdvanced = 0;
        $totalDiscount = 0;
        $totalRest = 0;
        $totalnet = 0;
        $total = 0;
        $nbre = 0;
        $countArticles = 0;
        $nbr_articles= 0;
        //dd($date);
        $deposits = Deposit::where('deposit_date', '>=', Carbon::now()->format('Y-m-d'))
                            ->where("agency_id", Auth::user()->agency_id)
                            ->where('user_id', $id)
                            ->get();

        foreach($deposits as $deposit){
            $depositUnits = DepositUnit::where('deposit_id', $deposit->id)
                            ->get();
            if($depositUnits){
                foreach($depositUnits as $unit){
                    $countArticles += $unit->quantity;
                }
            }

            $totalAdvanced += $deposit->advanced;
            $totalDiscount += $deposit->discount;
            $totalRest += $deposit->total - $deposit->advanced - $deposit->discount;
            $totalnet += $deposit->total + $deposit->discount;
            $total += $deposit->total;
            // $total += $deposit->amount_paid;
            $nbre ++;
            $depositedarticles = DB::table('deposit_units')
            ->where('client_id', '=', $deposit->client_id)
            ->where('deposit_id', '=', $deposit->id)
            ->get();
            foreach ($depositedarticles as $depot){
                $nbr_articles += $depot->quantity;

            }
        }
        return view('stats.salecasheer', compact('date_now','date','nbre','deposits', 'total','totalAdvanced','totalDiscount', 'totalRest', 'totalnet', "countArticles", 'nbr_articles'));
    }


    public function indexSearchDiscount()
    {
        return view('statsDiscount.searchDiscount');
    }

    public function getSearchDiscount()
    {
        return view('statsDiscount.indexDiscount');
    }

    public function sendDataDiscount(Request $request)
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
            $deposits = Deposit::whereDate('created_at', '>=' , $date_debut)
                                   ->whereDate('created_at', '<=' , $date_fin)
                                   ->whereNotIn('discount', ['null', 0])
                                //    ->whereNotNull('discount')
                                    ->where('agency_id', '=', Auth::user()->agency_id)
                                   ->orderBy('total', 'desc')
                                   ->get();

            foreach($deposits as $deposit){
                $total += $deposit->total;
            }

                return view('statsDiscount.responseDiscount', compact('deposits', 'total'));
        }
    }

    public function postSearchDiscount(Request $request)
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
            $deposits = Deposit::whereDate('created_at', '>=' , $date_debut)
                                   ->whereDate('created_at', '<=' , $date_fin)
                                   ->whereNotIn('discount', ['null', 0])
                                   ->where('agency_id', '=', Auth::user()->agency_id)
                                   ->get();

            foreach($deposits as $deposit){
                $total += $deposit->total;
            }

                return view('statsDiscount.indexDiscount', compact('deposits', 'total'));
        }
    }

    public function searchDiscount(Request $request){
        // check if ajax request is coming or not
        if($request->ajax()) {
            $query = $request->get('customer');
            // select country name from database
            $data = DB::table('clients')
                            ->where('fullname', 'like', $query.'%')
                            ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .= '<li class="list-group-item" data-id="'.$row->id.'">'.$row->fullname.'</li>';
                }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">'.'Aucun client trouvé'.'</li>';
            }
            // return output result array
            return $output;
        }
    }



    public function indexSearchDaily()
    {
        return view('statsDaily.searchDaily');
    }

    public function getSearchDaily()
    {
        return view('statsDaily.indexDaily');
    }

    public function sendDataDaily(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            //'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'))->format('Y-m-d');
        $print_date = Carbon::parse($request->input('date_debut'));
        //$date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();
        $totalAdvanced = 0;
        $totalDiscount = 0;
        $totalRest = 0;
        $totalnet = 0;
        $total = 0;
        $nbre = 0;

        if (($date_debut != ''))  {
            //&& ($date_fin != '')
            $deposits = Deposit::whereDate('created_at', '=' , $date_debut)
                                    ->where('agency_id', '=', Auth::user()->agency_id)
                                   //->whereDate('created_at', '<=' , $date_fin)
                                   ->orderBy('total', 'desc')
                                   ->get();

            foreach($deposits as $deposit){
            $totalAdvanced += $deposit->advanced;
            $totalDiscount += $deposit->discount;
            $totalRest += $deposit->total - $deposit->advanced;
            $totalnet += $deposit->total + $deposit->discount;
            $total += $deposit->total;
            $nbre ++;
            }

                return view('statsDaily.responseDaily', compact('deposits', 'date_debut','date','nbre','deposits', 'total','totalAdvanced','totalDiscount', 'totalRest', 'totalnet', 'print_date'));
        }
    }

    public function postSearchDaily(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            //'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'))->format('Y-m-d');
        $print_date = Carbon::parse($request->input('date_debut'));
        //$date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();
        $totalAdvanced = 0;
        $totalDiscount = 0;
        $totalRest = 0;
        $totalnet = 0;
        $total = 0;
        $nbre = 0;
        $nbr_articles = 0;

        if (($date_debut != '')) {
            //&& ($date_fin != '')
            $deposits = Deposit::whereDate('created_at', '=' , $date_debut)
                                    ->where('agency_id', '=', Auth::user()->agency_id)
                                   //->whereDate('created_at', '<=' , $date_fin)
                                   ->get();

            foreach($deposits as $deposit){

                $totalAdvanced += $deposit->advanced;
                $totalDiscount += $deposit->discount;
                $totalRest += $deposit->total - $deposit->advanced;
                $totalnet += $deposit->total + $deposit->discount;
                $total += $deposit->total;
                $nbre ++;
                $depositedarticles = DB::table('deposit_units')
                ->where('client_id', '=', $deposit->client_id)
                ->where('deposit_id', '=', $deposit->id)
                ->get();
                foreach ($depositedarticles as $depot){
                    $nbr_articles += $depot->quantity;

                }
                }
            }

                return view('statsDaily.indexDaily', compact('deposits', 'date_debut','date','nbre','deposits', 'total','totalAdvanced','totalDiscount', 'totalRest', 'totalnet', 'print_date', 'nbr_articles'));
        }


    public function searchDaily(Request $request){
        // check if ajax request is coming or not
        if($request->ajax()) {
            $query = $request->get('customer');
            // select country name from database
            $data = DB::table('clients')
                            ->where('fullname', 'like', $query.'%')
                            ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .= '<li class="list-group-item" data-id="'.$row->id.'">'.$row->fullname.'</li>';
                }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">'.'Aucun client trouvé'.'</li>';
            }
            // return output result array
            return $output;
        }
    }

    public function getUserList(Request $request){
        if($request->ajax()) {
            $query = $request->get('customer');
            // select country name from database
            $data = DB::table('clients')
                            ->where('fullname', 'like', $query.'%')
                            ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .= '<li class="list-group-item" data-id="'.$row->id.'">'.$row->fullname.'</li>';
                }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">'.'Aucun client trouvé'.'</li>';
            }
            // return output result array
            return $output;
        }
    }

    public function getCasheer($beginDate, $endDate){
        $userIds = Deposit::whereDate('created_at', '>=' , $beginDate)
                            ->whereDate('created_at', '<=' , $endDate)
                            ->where('agency_id', '=', Auth::user()->agency_id)
                            ->distinct('user_id')->pluck('user_id');
        $users = [];
        $countDeposits = [];
        $solde = [];
        foreach($userIds as $user){
            $deposits = Deposit::whereDate('created_at', '>=' , $beginDate)
                            ->whereDate('created_at', '<=' , $endDate)
                            ->where('agency_id', '=', Auth::user()->agency_id)
                            ->where('user_id', '=', $user)->get();
            $users[] = User::withTrashed()->find($user)->fullname;
            $countDeposits[] = $deposits->count();
            $sum = 0;
            foreach($deposits as $dep){
                $sum += $dep->advanced;
            }
            $solde[] = $sum;


        }

        return view('stats.casheerstats', compact("users", "solde", "countDeposits"));
    }


}


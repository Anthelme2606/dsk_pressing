<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Promo;
use App\Models\Client;
use App\Models\Status;
use App\Models\Article;
use App\Models\Deposit;
use Barryvdh\DomPDF\PDF;
use App\Models\CodeSuffix;
use App\Models\DepositUnit;
use App\Models\DeliveryHour;
use Illuminate\Http\Request;
use App\Models\CheckedArticle;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
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
        $deposits = Deposit::where('status', '=', 1)
             ->where('agency_id', Auth::user()->agency_id)
             ->orderBy('id', 'desc')
             ->get();

        return view('deposits.index', compact('deposits'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $deposits = Deposit::where('client_id', $request->deposit)
                        ->where('status', 1)
                        ->where('agency_id', Auth::user()->agency_id)
                        ->get();
        // dd($request->deposit);
        if(count($deposits) != 0){
            $elts = DepositUnit::where('deposit_id', $deposits[0]->id)->get();

        }

        $amount = 0;
        foreach($elts as $elt){
            switch ($elt->type_action) {
                case 1:
                    $amount = $amount + $elt->article()->classic_price * $elt->quantity;
                    break;
                case 2:
                    $amount =$amount + $elt->article()->repass_price * $elt->quantity;
                    break;
                case 3:
                    $amount = $amount +$elt->article()->express_price * $elt->quantity;
                    break;
            }
        }

        $deposits[0]->total = $amount;
        $deposits[0]->retrieve_date = date('Y-m-d H:i:s', strtotime("$request->withdraw_date $request->withdraw_time")) ;
        $deposits[0]->advanced = $request->advanced;
        $promo = Promo::where('code', $request->promo)->get();
        if(count($promo) > 0){
            $deposits[0]->discount = $amount * $promo[0]->percentage / 100;
        }
        $deposits[0]->etat = "waiting";
        $deposits[0]->save();
        return redirect()->route('deposits.index');


    }

    public function postDateLivraison(Request $request){

        $this->validate($request, [
            'deposit_id' => 'required',
            'date_retrait' => 'required',
        ]);

        $deposit = Deposit::findOrFail($request->input('deposit_id'));

        $deposit->date_retrait = $request->input('date_retrait');

        $deposit->save();

        return redirect()->route('deposits.show', $deposit->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id

        $customer = Client::findOrFail($deposit->client_id);

         $depositedarticles = DepositUnit::where('client_id', '=', $deposit->client_id)
                                                ->where('deposit_id', '=', $deposit->id)
                                                ->get();

        return view('deposits.show', compact('deposit', 'customer', 'depositedarticles', 'date'));
    }

    public function bon($id)
    {
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id

        $customer = Client::findOrFail($deposit->client_id);

         $depositedarticles = DepositUnit::where('client_id', '=', $deposit->client_id)
                                                ->where('deposit_id', '=', $deposit->id)
                                                ->get();

        return view('deposits.bon', compact('deposit', 'customer', 'depositedarticles', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id

        $depositedarticles = DB::table('deposited_articles')
             ->where('client_id', '=', $deposit->client_id)
             ->where('deposit_id', '=', $deposit->id)
             ->get();

        return view('deposits.edit', compact('deposit', 'depositedarticles', 'date'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposit = Deposit::findOrFail($id);

        DepositUnit::where('deposit_id', $id)->delete();
        $deposit->deleter = Auth::user()->id;

        $deposit->delete();

        return redirect()->back()
            ->with('success',
             'Dépôt supprimé avec succès');
    }

    public function findPrice(Request $request)
    {
        $price = $request->unit;
        $article = Article::find($request->id);
        if ($price == "0"){
            $prix = $article->classic_price;
        } elseif ($price == "1"){
            $prix = $article->express_price;
        } elseif ($price == "2"){
            $prix = $article->repass_price;
        }

        return $prix;

    }


    public function pdfexport($id)
    {
        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id

        $date = Carbon::now();

        $depositedarticles = DB::table('deposited_articles')
             ->where('client_id', '=', $deposit->client_id)
             ->where('deposit_id', '=', $deposit->id)
             ->get();

        $data = ['deposit' => $deposit,
                 'depositedarticles' => $depositedarticles,
                 'date' => $date,
        ];

        $pdf = PDF::loadView('deposits.pdf', $data);

        //return $pdf->download('facture.pdf');

        return $pdf->stream('facture.pdf');
    }

    public function casheer_ticket($id){
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id

        $depositedarticles = DB::table('deposited_articles')
             ->where('client_id', '=', $deposit->client_id)
             ->where('deposit_id', '=', $deposit->id)
             ->get();

             return view('deposits.ticket', compact('deposit', 'depositedarticles', 'date'));
    }
}

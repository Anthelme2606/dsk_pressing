<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Article;
use App\Models\Deposit;
use App\Models\DepositUnit;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DepositUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function getDepositedarticles($id)
    {
        $customer = Client::findOrFail($id);

        $depositedarticles = DepositUnit::where('client_id', '=', $customer->id)
             ->where('status', '=', 0)
             ->get();

        //$depositedarticles = DepositedArticle::all();

        //$articles = Article::with('depositedarticles')->get();

        return view('depositedarticles.index', compact('depositedarticles', 'customer', 'id'));
    }

    public function add_command(Request $request){
        // dd($request);
        $search_existant_deposit = Deposit::where('client_id', $request->client_id)->get();

        if(count($search_existant_deposit) == 0){
            $deposit = new Deposit();
            $deposit->code = $this->stringGenerate();
            $deposit->deposit_date = Carbon::now();
            $deposit->retrieve_date = Carbon::now();
            $deposit->discount = 0;
            $deposit->advanced = 0;
            $deposit->total = 0;
            $deposit->client_id = $request->client_id;
            $deposit->user_id =  Auth::user()->id;
            $deposit->status = false;
            $deposit->save();

            // Depot
            $deposit_unit = new DepositUnit();
            $deposit_unit->article_id = $request->article;
            $deposit_unit->quantity = $request->quantity;
            $deposit_unit->type_action = $request->type_action;
            foreach($request->etats as $state){
                $deposit_unit->state = $deposit_unit->state . $state;
            }
            $deposit_unit->deposit_id = $deposit->id;
            $deposit_unit->client_id = intval($request->client_id);
            $deposit_unit->user_id = Auth::user()->id;
            $deposit_unit->save();
            return redirect()->back();

        } else {
            $new_deposit = new DepositUnit();
            $new_deposit->article_id = $request->article;
            $new_deposit->quantity = $request->quantity;
            $new_deposit->type_action = $request->type_action;
            foreach($request->etats as $state){
                // dd($request->etats);
                $new_deposit->state = $new_deposit->state + $state;
            }
            // dd($search_existant_deposit[0]->id);
            $new_deposit->deposit_id = $search_existant_deposit[0]->id;
            $new_deposit->client_id = intval($request->client_id);
            $new_deposit->user_id = Auth::user()->id;
            $new_deposit->save();
            return redirect()->back();
        }
    }

    private function stringGenerate(){
        $length = 6; // Length of characters
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $length; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;

    }

    public function store(Request $request)
    {

        $depositedarticle = new DepositUnit();

        $client = Client::findOrFail($depositedarticle->client_id);

        $article = Article::findOrFail($depositedarticle->article_id);

        $depositedarticle->article_title = $article->title;

        $depositedarticle->unit_price = $article->unit_price;

        $depositedarticle->status = 0;

        $depositedarticle->amount = $article->unit_price * $depositedarticle->quantity;

        $lastDeposit = Deposit::orderBy('id', 'DESC')->first();

        if ($lastDeposit) {
            $depositedarticle->deposit_id = $lastDeposit->id + 1;
        } else {
            $depositedarticle->deposit_id = 1;
        }

        $depositedarticle->client_name = $client->name.' '.$client->firstname;

        $depositedarticle->save();

        //Redirect to the customers.index view and display message
        return redirect()->route('depositedarticle.index', $depositedarticle->client_id)
            ->with('success',
             'Nouvel ajouté au panier.');
    }

    public function delete(Request $request)
    {
        $depositedarticle = DepositUnit::findOrFail($request->id);
        $depositedarticle->delete();
        return redirect()->back();
    }

    public function add(Request $request, int $id)
    {
        $customer = Client::findOrFail($id);
        $depot = Deposit::where('client_id', $id)->where('status', 1)->get();
        if(count($depot) == 0){
            $deposit = new Deposit();
            $deposit->code = $this->stringGenerate();
            $deposit->deposit_date = Carbon::now();
            $deposit->retrieve_date = Carbon::now();
            $deposit->discount = 0;
            $deposit->advanced = 0;
            $deposit->total = 0;
            $deposit->client_id = $id;
            $deposit->user_id =  Auth::user()->id;
            $deposit->status = false;
            $deposit->save();
            $list_deposits = [];
        } else {
            $list_deposits = DepositUnit::where('deposit_id', $depot[0]->id)->get();
        }
        // $list_deposits = DepositUnit::where('deposit_id', $deposit[0]->id)->get();
        //dd($customer);

        $articles = Article::all();
        $etats = Status::get();

        return view('depositedarticles.create', compact('customer', 'articles', 'id','etats', 'list_deposits'));
    }
}

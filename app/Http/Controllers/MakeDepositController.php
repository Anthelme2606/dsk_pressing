<?php

namespace App\Http\Controllers;

use App\Models\Render;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\Status;
use App\Models\ClientGroup;
use App\Models\Article;
use App\Models\Promo;
use App\Models\Client;
use App\Models\DepositUnit;
use App\Models\DeliveryHour;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class MakeDepositController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    // Retourne la liste des dépôts
    public function get_list_deposits(){
        $deposits = Deposit::where('status', 1)->where("agency_id", Auth::user()->agency_id)->get();
        return view("deposits.index", compact('deposits'));
    }

    // Supprimer un dépôt
    public function delete_deposit($id){
        $deposit = Deposit::findOrFail($id);
        DepositUnit::where('deposit_id', $id)->delete();
        $deposit->delete();

        return redirect()->back()->with('success', 'Dépôt supprimé avec succès');
    }


    // valider un dépot pour qu'il devienne un retrait
    public function validate_deposit($id){
        // Chercher le dépôt en question
        $deposit = Deposit::findOrFail($id);
        // dd($deposit);

        // Changer son statut en false si le total est réglé

        if(floatval($deposit->left_to_pay) > 0 )
            return redirect()->route("editDeposit", $deposit->id);

        Transaction::create([
            "amount" => 0,
            "type" => "in",
            "deposit_id" => $deposit->id,
            "transaction_date" => Carbon::now()
        ]);
        $deposit->instant_retrieve = Carbon::now()->format('Y-m-d');
        $deposit->status = false;
        $deposit->receiver = Auth::user()->id;
        $deposit->save();
        // Changer le statut des lignes de commande
        $deposits = DepositUnit::where('deposit_id', $deposit->id)->get();
        foreach($deposits as $dep){
            $dep->state = false;
            $dep->save();
        }
        return redirect()->back()->with('success', 'Le dépôt précédent a bien été validé');
    }

    // Valider un dépot
    public function add_money(Request $request){

        $deposit = Deposit::findOrFail($request->id);

        // $deposit->advanced += $request->money_plus;
        $deposit->left_to_pay -= $request->money_plus;
        Transaction::create([
            "amount" => $request->money_plus,
            "type" => "in",
            "deposit_id" => $deposit->id,
            "transaction_date" => Carbon::now()
        ]);

        if($deposit->left_to_pay > 0){
            // $deposit->instant_retrieve = Carbon::now();
            $deposit->save();
            return redirect()->route("get_list_deposits")->with('success', 'Paiement partiel enregistré. Veuillez solder le reste pour pouvoir effectuer le retrait.');
        }else {
            $deposit->instant_retrieve = Carbon::now();
            $deposit->receiver = Auth::user()->id;
            $deposit->status = false;
            $deposit->save();
            return redirect()->route('deliveries.index');
        }
    }

    // Ajouter une ligne au dépôt
    public function create_deposit_line(Request $request){
        $depositunit = new DepositUnit();
        $depositunit->article_id = $request->article;
        $depositunit->quantity = $request->quantity;
        $depositunit->user_id = $request->user_id;
        $depositunit->client_id = $request->client_id;
        $depositunit->deposit_id = $request->deposit_id;
        foreach ($request->actions as $action){
            $depositunit->type_action = $action;
        }
        foreach ($request->etats as $state){
            $depositunit->state .= $state;
        }
        $depositunit->render = $request->render;

        $depositunit->save();

        return back();
    }


    // Supprimer une ligne
    public function delete_deposit_line($id){
        Deposit::findOrFail($id)->delete();
    }

    // Page principale pour faire le dépot
    public function create_deposit(Request $request, $id){
        // Chercher si un dépôt est en cours
        // $depot = Deposit::where('client_id', $id)->where('status', 1)->get();
        // Si oui retourner le dépot

        // $deposit = new Deposit();
        // $deposit->code = $this->stringGenerate();
        // $deposit->deposit_date = Carbon::now();
        // $deposit->retrieve_date = Carbon::now();
        // $deposit->discount = 0;
        // $deposit->advanced = 0;
        // $deposit->total = 0;
        // $deposit->client_id = $id;
        // $deposit->user_id =  Auth::user()->id;
        // $deposit->status = true;
        // $deposit->type_reglement = "";

        // $deposit->save();
        // $myDeposit = $deposit;


        // $list_deposits = DepositUnit::where('deposit_id', $myDeposit->id)->get();
        $client = Client::find($id);
        $articles = Article::where('status', 1)->get();
        $articles = $articles->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $etats = Status::all();
        $renders = Render::all();
        $groups = ClientGroup::where("client_id", $client->id)->get();
        $percentage = 0;
        $group_title = "";
        if(count($groups) > 0){
            $checked = true;
            $percentage = $groups[0]->group()->rate;
            $group_title = $groups[0]->group()->title;
        } else {
            $checked = false;

        }


        return view('depositedarticles.create', compact('id', 'articles', 'etats', 'renders', 'client', 'checked', 'percentage', 'group_title'));
    }

    // Générer une chaine de caractères de 6
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

    // list des dépots et liste des articles
    public function list_deposit_articles($id){
        $list_articles = Article::all();
        $list_deposits = DepositUnit::where('deposit_id', $id)->get();

        return response()->json(
            [
                'articles' => $list_articles,
                'deposits' => $list_deposits,
            ]
            );
    }

    public function doDeposit(Request $request) {

        // dd($request);
        // $deposit = Deposit::find($request->deposit_id);
        $deposit = new Deposit();
        $deposit->code = $this->stringGenerate();
        // $deposit->designation = $request->designation;
        $deposit->deposit_date = Carbon::now();
        $deposit->retrieve_date = Carbon::now();
        $deposit->discount = 0;
        $deposit->advanced = 0;
        $deposit->agency_id = Auth::user()->agency_id;
        $deposit->total = 0;
        $deposit->client_id = $request->client_id;
        $deposit->user_id =  Auth::user()->id;
        $deposit->status = true;
        $deposit->type_reglement = "";

        $deposit->save();

        $global_amount = 0;
        $myDeposit = Deposit::find($deposit->id);

        for($i=0; $i<count($request->article_id); $i++){
            $depositUnit = new DepositUnit();
            $depositUnit->article_id = $request->article_id[$i];
            $depositUnit->client_id = $request->client_id;
            if($request->designation[$i] == null){
                $depositUnit->designation = "";
            } else {
                $depositUnit->designation = $request->designation[$i];
            }

            $depositUnit->user_id = Auth::user()->id;
            if($request->etats_0 != null){
                foreach ($request->etats_0 as $state){
                    $depositUnit->state .= $state;
                }
            } else {
                $depositUnit->state= "";
            }

            $depositUnit->quantity = $request->quantity[$i];
            $depositUnit->deposit_id = $myDeposit->id;
            if($request->action == 0){
                $global_amount += $depositUnit->quantity * $depositUnit->article()->classic_price;
            } else if($request->action == 1){
                $global_amount += $depositUnit->quantity * $depositUnit->article()->express_price;
            } else if($request->action == 2){
                $global_amount += $depositUnit->quantity * $depositUnit->article()->repass_price;
            }

            if($request->tidy[$i] == "Cintre"){
                $depositUnit->render = 1;
            } else {
                $depositUnit->render = 0;
            }
            // if(Article::find($request->article_id[$i])->classic_price == $request->price[$i]){
            //     $depositUnit->type_action = 0;
            //     $action = 0;
            // } elseif(Article::find($request->article_id[$i])->repass_price == $request->price[$i]){
            //     $depositUnit->type_action = 1;
            //     $action = 1;
            // } elseif(Article::find($request->article_id[$i])->classic_price == $request->price[$i]){
            //     $depositUnit->type_action = 2;
            //     $action = 2;
            // }
            $depositUnit->type_action = $request->action;
            $action = $request->action;
            $depositUnit->save();
        }

        $myDeposit->advanced = $request->amount_paid;
        $code_promo = $request->promo;
        $promos = Promo::where("code", $code_promo)->where('status', true)->get();
        $date1 = Carbon::now();
        // dd($promos);
        if(count($promos)>0){
            if($promos->first()->quota>0 && $date1->gt($promos->first()->ending_date) && $date1->lt($promos->first()->createdAt));
            {
                $plus_percentage = floatval($promos->first()->percentage);
                $myDeposit->discount = ($plus_percentage * $global_amount / 100);
                $promos->first()->quota--;
                $promos->first()->save();
            }
        }
        else {
            $myDeposit->discount = ($request->discount * $global_amount / 100);
        }

        $last_date = Carbon::parse($myDeposit->deposit_date);

        $time = DeliveryHour::orderBy('created_at', 'desc')->first()->lavage_hour;
        $timeExpress = DeliveryHour::orderBy('created_at', 'desc')->first()->express_hour;
        $timeRepass = DepositUnit::orderBy('created_at', 'desc')->first()->repassage_hour;

        if($action == 0) {
            $myDeposit->retrieve_date = $last_date->addHour($time);

        } elseif ($action == 1){
            $myDeposit->retrieve_date = $last_date->addHour($timeExpress);

        } elseif ($action == 2){
            $myDeposit->retrieve_date = $last_date->addHour($timeRepass);
        }

        $myDeposit->retrieve_date = $myDeposit->retrieve_date->setTime(17, 0, 0);



        $myDeposit->total = $global_amount - $deposit->discount;
        $myDeposit->type_reglement = $request->mode_reglement;
        $myDeposit->left_to_pay = $myDeposit->total - $myDeposit->discount - $myDeposit->advanced;
        Transaction::create([
            "amount" => $request->amount_paid,
            "type" => "in",
            "deposit_id" => $deposit->id,
            "transaction_date" => Carbon::now()
        ]);


        $myDeposit->save();

        return redirect()->route('deposits.show', $myDeposit->id);

    }

    public function show($id)
    {
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id
        $customer = Client::findOrFail($deposit->client_id);

        $depositedarticles = DepositUnit::where('client_id', '=', $deposit->client_id)
            ->where('deposit_id', '=', $deposit->id)
            ->get();


        $user = User::findOrFail($deposit->user_id);
        setlocale(LC_TIME, 'French');
        return view('deposits.show', compact('deposit', 'customer', 'depositedarticles', 'user'));
    }

    public function retrieve($id)
    {
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id
        $customer = Client::findOrFail($deposit->client_id);

        $depositedarticles = DepositUnit::where('client_id', '=', $deposit->client_id)
            ->where('deposit_id', '=', $deposit->id)
            ->get();


        $user = User::findOrFail($deposit->user_id);
        setlocale(LC_TIME, 'French');
        return view('deposits.partial_retrieve', compact('deposit', 'customer', 'depositedarticles', 'user'));
    }

    public function facture($id)
    {
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id
        $customer = Client::findOrFail($deposit->client_id);

        $depositedarticles = DepositUnit::where('client_id', '=', $deposit->client_id)
            ->where('deposit_id', '=', $deposit->id)
            ->get();


        $user = User::findOrFail($deposit->user_id);
        setlocale(LC_TIME, 'French');
        return view('deposits.facture', compact('deposit', 'customer', 'depositedarticles', 'user'));
    }

    public function postDateLivraison(Request $request){

        $this->validate($request, [
            'deposit_id' => 'required',
            'date_retrait' => 'required',
        ]);

        $deposit = Deposit::findOrFail($request->input('deposit_id'));

        $deposit->retrieve_date = $request->input('date_retrait');

        $deposit->save();

        return redirect()->route('deposits.show', $deposit->id);
    }

    public function editDeposit($id){
        $deposit = Deposit::find($id);
        $list_units = DepositUnit::where("deposit_id", $deposit->id)->get();
        $qte = 0;
        foreach($list_units as $unit){
            $qte += $unit->quantity;
        }
        return view('deposits.edit', compact('deposit', 'qte'));
    }

    public function ticket_casheer($id){
        $date = Carbon::now();

        $deposit = Deposit::findOrFail($id); //Find deposit of id = $id
        $customer = Client::findOrFail($deposit->client_id);

        $depositedarticles = DepositUnit::where('client_id', '=', $deposit->client_id)
            ->where('deposit_id', '=', $deposit->id)
            ->get();


        $user = User::findOrFail($deposit->user_id);
        setlocale(LC_TIME, 'French');
        return view('deposits.ticket', compact('deposit', 'customer', 'depositedarticles', 'user'));
    }

    public function verify_existing_deposit($id){
        $deposits_for_client = Deposit::where('client_id', $id)->where('status', 1)->get();

        if(count($deposits_for_client)>0){
            $myDeposit = $depot[0];
            return response()->json(
                [
                    'deposit' => $myDeposit
                ]
                );
        } else {
            $deposit = new Deposit();
            $deposit->code = $this->stringGenerate();
            $deposit->deposit_date = Carbon::now();
            $deposit->retrieve_date = Carbon::now();
            $deposit->discount = 0;
            $deposit->advanced = 0;
            $deposit->total = 0;
            $deposit->client_id = $id;
            $deposit->user_id = Auth::user()->id;
            $deposit->status = true;
            $deposit->save();
            $myDeposit = $deposit;
        }

        $list_deposits = DepositUnit::where('deposit_id', $myDeposit->id)->get();

        $articles = Article::where('status', 1)->get();
        $etats = Status::all();
        $renders = Render::all();

        return view('depositedarticles.create', compact('id', 'articles', 'etats', 'list_deposits', 'renders', 'myDeposit'));

    }

    public function show_deposit($id){

        $deposit = Deposit::find($id);
        $deposit_units = DepositUnit::where("deposit_id", $deposit->id)->get();
        $transactions = Transaction::where('deposit_id', $deposit->id)->get();

        return view('deposits.show_deposit', compact('deposit', 'deposit_units', 'transactions'));
    }

    public function deposit_search(Request $request){
        return view('deposits.search');
    }

    public function onwaiting(Request $request){

        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();


        if(Auth::user()->getRoleNames()->contains("admin")){
            $deposits = Deposit::where('status', 1)->where('agency_id', '=', Auth::user()->agency_id)->whereDate('retrieve_date', '<', Carbon::today())
                    ->whereDate('created_at', '<=' , $date_fin)
                    ->whereDate('created_at', '>=' , $date_debut)
                    ->get(); //Get all deliveries

            return view('deposits.onwaiting')->with('deposits', $deposits);
        } else {
            $deposits = Deposit::where('status', 1)->where('agency_id', '=', Auth::user()->agency_id)->whereDate('retrieve_date', '<', Carbon::today())->where("user_id", Auth::user()->id)
                            ->whereDate('created_at', '<=' , $date_fin)
                            ->whereDate('created_at', '>=' , $date_debut)
                            ->get(); //Get all deliveries

            return view('deposits.onwaiting')->with('deposits', $deposits);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreClientRequest;
use App\Models\ClientGroup;
use Illuminate\Support\Carbon;
use App\Models\Render;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;
use App\Models\Article;
use App\Models\DepositUnit;
//use app;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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

    public function index()
    {
        $client = Client::all();
        //$client = Client::orderByDesc('created_at')->get();
        $clients = $client->reverse();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $this->validate($request, [
            // 'email' => 'email|unique:clients',
        ]);

        if ($request->hasfile('picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('picture')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'avatar.jpg';
        }

        $sponsorship = new Sponsorship();
        $sponsorship->sponsor_code = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
        $sponsorship->referral_code = "";
        $sponsorship->save();

        $account = new Account();
        $account->num = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
        $account->amount = 0;
        $account->status = false;
        $account->save();

        $client = new Client();
        $client->fullname = $request->fullname;
        $client->password = Hash::make($request->password);
        $client->picture = $fileNameToStore;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->fixe_number = $request->fixe_number;
        $client->birthday = $request->birthday;
        $client->waiting_for = $request->waiting_for;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->sponsorship_code = $sponsorship->id;
        $client->account_id = $account->id;
        $client->status = true;

        $client->save();

        // $depot = Deposit::where('client_id', $client->id)->where('status', 1)->get();
        // // Si oui retourner le dépot
        // if(count($depot)>0){
        //     $myDeposit = $depot[0];
        // } else {
            // $deposit = new Deposit();
            // $deposit->code = $this->stringGenerate();
            // $deposit->deposit_date = Carbon::now();
            // $deposit->retrieve_date = Carbon::now();
            // $deposit->discount = 0;
            // $deposit->advanced = 0;
            // $deposit->total = 0;
            // $deposit->client_id = $client->id;
            // $deposit->user_id =  Auth::user()->id;
            // $deposit->status = true;
            // $deposit->save();
            // $deposit->type_reglement = "";
            // $myDeposit = $deposit;
        // }
        // $list_deposits = DepositUnit::where('deposit_id', $myDeposit->id)->get();

        $articles = Article::where('status', 1)->get();
        $etats = Status::all();
        $renders = Render::all();
        $id = $client->id;
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

        // return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès. Vous pouvez procéder à son dépôt');

    }

    public function show($id)
    {
        return redirect()->route('clients.index');
    }


    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {


        if ($request->hasfile('picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('picture')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }



        $client = Client::findOrFail($id);
        $client->fullname = $request->fullname;
        $client->picture = $fileNameToStore;
        $client->email = $request->email;
        $client->phone_number = $request->phone_number;
        $client->address = $request->address;

        $client->save();
        //Redirect to the clients.index view and display message
        return redirect()->route('clients.index')
            ->with('success',
             'Client édité avec succès.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $client->delete();


        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès');
    }
}

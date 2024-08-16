<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Deposit;
use App\Models\DepositUnit;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientspaceController extends Controller
{

    public function __construct(){
        $this->middleware('auth.client');
    }

    public function list_deposits(){
        $user = Auth::guard('client')->user();
        $deposits = Deposit::where('client_id', $user->id)->where('status', 1)->get();

        return view("clientSpace.myDeposits", compact('deposits'));
    }

    public function list_withdraws(){
        $user = Auth::guard('client')->user();
        $deposits = Deposit::where('client_id', $user->id)->where('status', 0)->get();
        return view("clientSpace.myDeliveries", compact('deposits'));
    }

    public function index(){
        $user = Auth::guard('client')->user();
        $myDeposits = Deposit::where('client_id', $user->id)->where('status', 1)->get();
        $myDeliveries = Deposit::where('client_id', $user->id)->where('status', 0)->get();
        $countDeposit = count($myDeposits);
        $countDelivery = count($myDeliveries);
        return view('clientarea', compact('myDeposits', 'myDeliveries', 'countDeposit', 'countDelivery'));
    }

    public function change_password(Request $request){
        $user = Auth::guard('client')->user();
        if(Hash::check($request->old_password, Client::find($user->id)->password)){
            $client = Client::find($this->user->id);
            $client->password = Hash::make($request->new_password);
            $client->save();
        } else {
            return redirect()->back()->with('error', "Le mot de passe saisi est invalide");
        }

        return redirect()->route('clientarea')->with('success', 'votre mot de passe a bien été modifié');
    }

    public function change_profil_data(Request $request){
        $this->validate($request, [
            'fullname' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required'
        ]);

        Client::find($this->user->id)->update(
            [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]
        );

        return redirect()->back()->with('success', 'Profil mis à jour avec succès');

    }

    public function setting()
    {
        return view('profils.setting2');
    }

    public function profile(){
        return view("profils.index2");
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
        return view('deposits.clientshow', compact('deposit', 'customer', 'depositedarticles', 'user'));
    }

}

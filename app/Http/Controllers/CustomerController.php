<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.client');
    }


    public function mydeposits()
    {
        // $user_id = auth()->user()->id;
        // $client = Client::where('user_id', $user_id)
        //                         ->first();
        // $deposits = Deposit::where('client_id', $client->id)
        //                     ->get();

        $theId = Auth::guard('client')->user()->id;
        $deposits = Deposit::where('client_id', $theId)->where('status', 1)->get();

        return view("customers.mydeposits", compact('deposits'));
    }

    public function mydeliveries()
    {
        // $user_id = auth()->user()->id;
        // $client = Client::where('user_id', $user_id)
        //                     ->first();
        // $deliveries = Deposit::where('client_id', $client->id)
        //                     ->get();

        $theId = Auth::guard('client')->user()->id;
        $deposits = Deposit::where('client_id', $theId)->where('status', 1)->get();
        // $withdrawals = Deposit::where('client_id', $this->user->id)->where('status', 0)->get();
        return view('customers.mydeliveries', compact('deposits'));
    }

    public function destroy($id)
    {
        //Find a user with a given id and delete
        $mydeposit = Deposit::findOrFail($id);

        $mydeposit->delete();

        return redirect()->route('customers.mydeposits')
            ->with('success',
             'Ce dépôt a été supprimé avec succès.');
    }
}

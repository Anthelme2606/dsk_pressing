<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agency;
use App\Models\Client;
use App\Models\Deposit;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $clients = Client::all(); //Get all Clients
        $nbre_clients = count($clients);

        $agencies = Agency::all(); //Get all Agencies
        $nbre_agencies = count($agencies);

        $users = User::all(); //Get all Users
        $nbre_users = count($users);

        $deliveries = Deposit::all(); //Get all Deposits
        $nbre_deliveries = count($deliveries);

        return view('welcome', compact('nbre_clients', 'nbre_agencies', 'nbre_users', 'nbre_deliveries'));
    }
}

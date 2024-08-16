<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Deposit;

class DashboardClient extends Controller
{
    private $user;

    public function __construct(){
        $this->middleware('auth.client');
        $this->user = Auth::guard('client')->user();
    }

    public function client_deposit(){
        $deposits = Deposit::where('client_id', $this->user->id)->where('status', 1)->get();

        return view("customers.mydeposits", compact('deposits'));
    }

    public function client_withdraw(){
        $withdrawals = Deposit::where('client_id', $this->user->id)->where('status', 0)->get();

        return view("customers.deliveries", compact('withdrawals'));
    }

    
}

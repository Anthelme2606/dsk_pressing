<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecapAgencyController extends Controller
{
    public function index(){

        $agencies = Agency::all();
        foreach($agencies as $agency){
            $agency->in_outs = InOut::where('agency_id', $agency->id)->get();
        }
        return view('recap_agency.index');
    }
}

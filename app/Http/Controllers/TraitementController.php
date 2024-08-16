<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class TraitementController extends Controller
{

    public function list_new_deposits(){
        $deposits = Deposit::where('etat', 'waiting')->where("agency_id", Auth::user()->agency_id)->get();

        return view("traitements.list_new_deposits", compact("deposits"));
    }

    public function list_deposits_in_progress(){
        $user = Auth::user();

        if($user->role == 'admin'){
            $deposits = Deposit::where('etat', 'in_progress')->where("agency_id", Auth::user()->agency_id)->get();
        } else {
            $deposits = Deposit::where('etat', 'in_progress')->where('laveur_id', $user->id)->where("agency_id", Auth::user()->agency_id)->get();
        }

        return view('traitements.list_deposits_in_progress', compact("deposits"));
    }

    public function make_in_progress($id){
        $deposit = Deposit::find($id);
        $deposit->laveur_id = Auth::user()->id;
        $deposit->etat = 'in_progress';
        $deposit->save();

        return redirect()->route("traitements.in_progress");
    }

    public function make_treated($id){
        $deposit = Deposit::find($id);
        $deposit->etat = 'treated';
        $deposit->save();

        return redirect()->route("traitements.treated");
    }

    public function list_deposits_treated(){
        $user = Auth::user();

        if($user->role == 'admin'){
            $deposits = Deposit::where('etat', 'treated')->where("agency_id", Auth::user()->agency_id)->get();
        } else {
            $deposits = Deposit::where('etat', 'treated')->where('laveur_id', $user->id)->where("agency_id", Auth::user()->agency_id)->get();
        }


        return view('traitements.list_deposits_treated', compact("deposits"));
    }

    public function list_deposits_classed(){
        $user = Auth::user();

        if($user->role == 'admin'){
            $deposits = Deposit::where('etat', 'classed')->where("agency_id", Auth::user()->agency_id)->get();
        } else {
            $deposits = Deposit::where('etat', 'classed')->where('classeur_id', $user->id)->where("agency_id", Auth::user()->agency_id)->get();
        }

        return view('traitements.list_deposits_classed', compact("deposits"));
    }

    public function list_deposits_treated_all(){
        $deposits = Deposit::where('etat', 'treated')->where("agency_id", Auth::user()->agency_id)->get();
        return view('traitements.list_deposits_treated', compact("deposits"));
    }

    public function make_classed($id){
        $deposit = Deposit::find($id);
        $deposit->classeur_id = Auth::user()->id;
        $deposit->etat = 'classed';
        $deposit->save();

        return redirect()->route("traitements.classed");
    }
}

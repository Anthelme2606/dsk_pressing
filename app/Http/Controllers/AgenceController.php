<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Country;
use App\Models\CodeSuffix;
use App\Models\Pressing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AgenceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'role:admin']);
    }


    public function index()
    {
        $agencies = Agency::all();
        return view('agences.index', compact('agencies'));
    }


    public function create()
    {
        $countries = Country::all();
        $pressings = Pressing::where('status', '=', 1)->get();
        return view('agences.create', compact('countries', 'pressings'));
    }


    public function store(Request $request)
    {
        $agence = new Agency;
        $agence->name = $request->name;
        $agence->address = $request->address;
        $agence->contact = $request->phone;
        $agence->pressing_id = $request->pressing_id;
        $agence->country_id = $request->country_id;
        $agence->status = true;
        $agence->save();


        return redirect()->route('agences.index')->with('success', 'Votre agence a été créée avec succès');
    }

    public function show($id)
    {
        return redirect()->route('agences.index');
    }


    public function edit($id)
    {
        $agence = Agency::findOrFail($id);
        $countries = Country::all();
        return view('agences.edit', compact('agence', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $agence = Agency::findOrFail($id);

        $agence->name = $request->name;
        $agence->address = $request->address;
        $agence->contact = $request->contact;
        $agence->country_id = $request->country_id;
        $agence->save();


        return redirect()->route('agences.index')->with('success', 'Agence mise à jour avec succès');

    }

    public function destroy($id)
    {
        $agency = Agency::findOrFail($id)->delete();


        return redirect()->route('agences.index')->with('success', 'Agence supprimée avec succès');
    }
}

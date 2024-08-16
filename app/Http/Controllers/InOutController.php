<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InOut;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InOutController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $in_outs = InOut::where("agency_id", Auth::user()->agency_id)->get();
        $in_price = 0;
        $out_price = 0;
        foreach($in_outs as $in_out){
            if($in_out->type=="in"){
                $in_price += $in_out->montant;
            } else {
                $out_price += $in_out->montant;
            }
        }

        return view('in_out.index', compact('in_outs', 'out_price', 'in_price'));
    }

    public function create(){
        return view('in_out.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'libelle' => 'required',
            'type' => 'required',
            'montant' => 'required',
            'action_date' => 'required'
        ]);

        $in_out = new InOut();
        $in_out->libelle = $request->libelle;
        $in_out->type = $request->type;
        $in_out->montant = $request->montant;
        $in_out->action_date = $request->action_date;
        $in_out->agency_id = Auth::user()->agency_id;
        $in_out->status = false;
        $in_out->save();

        return redirect()->route('in_out.index')->with('success', 'L\'action a bien été enregistré');
    }

    public function edit($id){
        $in_out = InOut::find($id);
        return view('in_out.edit', compact('in_out'));
    }

    public function update(Request $request, $id){
        $in_out = InOut::findOrFail($id);
        $this->validate($request, [
            'libelle' => 'required',
            'montant' => 'required',
            'type' => 'required'
        ]);

        $in_out->libelle = $request->libelle;
        $in_out->montant = $request->montant;
        $in_out->type = $request->type;
        $in_out->action_date = $request->action_date;
        $in_out->status = false;
        $in_out->save();

        return redirect()->route('in_out.index')->with(
            'success', 'Votre demande a été bien exécutée'
        );
    }

    public function show(){

    }

    public function destroy($id){
        $in_out = InOut::findOrFail($id);
        $in_out->delete();

        return redirect()->route('in_out.index')->with('success', "Votre demande a été bien prise en compte");
    }

    public function search(Request $request){
        return view('in_out.search');
    }

    public function make_search(Request $request){

        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = Carbon::parse($request->input('date_debut'));
        $date_fin = Carbon::parse($request->input('date_fin'));
        $date = Carbon::now()->toDateString();
        $in_price = 0;
        $out_price = 0;


        if (($date_debut != '') && ($date_fin != '')) {
            $in_outs = InOut::whereDate('created_at', '>=' , $date_debut)
                                   ->whereDate('created_at', '<=' , $date_fin)
                                   ->where('agency_id', '=', Auth::user()->agency_id)
                                   ->get();

            foreach($in_outs as $in_out){
                if($in_out->type=="in"){
                    $in_price += $in_out->montant;
                } else {
                    $out_price += $in_out->montant;
                }
            }
            $beginDate = $request->date_debut;
            $endDate=$request->date_fin;

            return view('in_out.result', compact('out_price', 'in_price', 'beginDate', 'endDate', 'in_outs'));
        }
    }

    public function validateInOut($id){
        $in_out = InOut::findOrFail($id);
        $in_out->status = true;
        $in_out->save();

        return redirect()->back()->with('success', 'Votre demande a été bien prise en compte');
    }

}

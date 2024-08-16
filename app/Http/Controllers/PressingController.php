<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pressing;

class PressingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $pressings = Pressing::where('status', '=', 1)->get();
        return view('pressings.index', compact('pressings'));
    }


    public function create()
    {
        return view('pressings.create');
    }


    public function store(Request $request)
    {
        Pressing::create(
            [
                "name" => $request->name,
                "details" => $request->details
            ]
        );

        return redirect()->route('pressings.index')->with('success', 'Votre pressing a été créé avec succès');
    }

    public function show($id)
    {
        return redirect()->route('pressings.index');
    }


    public function edit($id)
    {
        $pressing = Pressing::findOrFail($id);
        return view('pressings.edit', compact('pressing'));
    }


    public function update(Request $request, $id)
    {
        $pressing = Pressing::findOrFail($id);

        $pressing->name = $request->name;
        $pressing->details = $request->details;

        $pressing->save();

        return redirect()->route('pressings.index')->with('success', 'Pressing mise à jour avec succès');
    }


    public function destroy($id)
    {
        $pressing = Pressing::findOrFail($id);
        $pressing->status = false;
        $pressing->save();

        return redirect()->route('pressings.index')->with('success', 'Pressing supprimé avec succès');
    }
}

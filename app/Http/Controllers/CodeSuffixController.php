<?php

namespace App\Http\Controllers;

use App\Models\CodeSuffix;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeSuffixController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codesuffixes = CodeSuffix::all();
        $agences = Agency::all();
        return view('codesuffixes.index', compact('codesuffixes', 'agences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agency::all();
        return view('codesuffixes.create', compact('agences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CodeSuffix::create([
            'title' => $request->title,
            'agency_id' => $request->agency_id
        ]);

        return redirect()->route('codesuffixes.index')->with('success', 'Suffixe ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codesuffixe = CodeSuffix::findOrFail($id); //Find codesuffixe of id = $id

        return view('codesuffixes.show', compact('codesuffixe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codesuffixe = CodeSuffix::findOrFail($id); //Find codesuffixe of id = $id
        $agences = Agency::all();
        return view('codesuffixes.edit', compact('codesuffixe', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $codesuffixe = CodeSuffix::findOrFail($id); //Find codesuffixe of id = $id

        $this->validate($request, [
            'title' => 'required|max:120',
        ]);

        $codesuffixe->title = $request->input('title');
        $codesuffixe->agency_id = $request->input('agency_id');

        $codesuffixe->save();

        //Redirect to the codesuffixes.index view and display message
        return redirect()->route('codesuffixes.index')
            ->with('success',
             'Suffixe édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codesuffixe = CodeSuffix::findOrFail($id);

        $codesuffixe->delete();

        return redirect()->route('codesuffixes.index')
            ->with('success',
             'Suffixe supprimé avec succès');
    }
}

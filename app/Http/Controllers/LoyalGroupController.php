<?php

namespace App\Http\Controllers;

use App\Models\LoyalGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoyalGroupController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $loyalgroups = LoyalGroup::all();

        return view('loyalgroups.index')->with('loyalgroups', $loyalgroups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loyalgroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120',
            'rate' => 'required|unique:loyal_groups',
            'description' => 'nullable',
        ],

        $messages = [
            'required' => 'Le champ :attribute est obligatoire.',
            'unique' => 'Ce taux de remise existe déjà. Veuillez choisir un autre svp!',
        ]
    );

        $loyalgroup = new LoyalGroup();
        $loyalgroup->title = $request->input('title');
        $loyalgroup->rate = $request->input('rate');
        $loyalgroup->description = $request->input('description');

        $loyalgroup->save();

        //Redirect to the loyalgroups.index view and display message
        return redirect()->route('loyalgroups.index')
            ->with('success',
             'Groupe de Fidélisation ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loyalgroup = LoyalGroup::findOrFail($id);

        return view('loyalgroups.show', compact('loyalgroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loyalgroup = LoyalGroup::findOrFail($id);

        return view('loyalgroups.edit', compact('loyalgroup'));
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
        $loyalgroup = LoyalGroup::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:120',
            'rate' => 'required|unique:loyal_groups,rate,'.$id,
            'description' => 'nullable',
        ],

        $messages = [
            'required' => 'Le champ :attribute est obligatoire.',
            'unique' => 'Ce taux de remise existe déjà. Veuillez choisir un autre svp!',
        ]

        );

        $loyalgroup->title = $request->input('title');
        $loyalgroup->rate = $request->input('rate');
        $loyalgroup->description = $request->input('description');

        $loyalgroup->save();

        //Redirect to the loyalgroups.index view and display message
        return redirect()->route('loyalgroups.index')
            ->with('success',
             'Groupe de Fidélisation mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loyalgroup = LoyalGroup::findOrFail($id);

        $loyalgroup->delete();

        return redirect()->route('loyalgroups.index')
            ->with('success',
             'Groupe de Fidélisation supprimé avec succès');
    }
}

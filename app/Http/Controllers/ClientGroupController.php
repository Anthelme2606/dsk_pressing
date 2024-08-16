<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientGroup;
use App\Models\LoyalGroup;
use Illuminate\Http\Request;

class ClientGroupController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientgroups = ClientGroup::all();
        return view('clientgroups.index', compact('clientgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loyalgroups = LoyalGroup::all();
        $clients = Client::all()->sortBy('fullname');

        return view('clientgroups.create', compact('loyalgroups', 'clients'));
    }

    public function add($id){
        $loyalgroups = LoyalGroup::all();
        $client = Client::findOrFail($id);
        return view('clientgroups.add', compact('loyalgroups', 'client'));
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
            'client_id' => 'required',
            'group_id' => 'required',
        ]);

        $clientGroup = new ClientGroup();
        $clientGroup->client_id = $request->client_id;
        $clientGroup->group_id = $request->group_id;
        $clientGroup->save();


        return redirect()->route('clientgroups.index')
            ->with('success',
             "Le Groupe de fidélisation a été assigné au Client avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientgroup = ClientGroup::findOrFail($id);

        return view('clientgroups.show', compact('clientgroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientgroup = ClientGroup::findOrFail($id);

        $loyalgroups = LoyalGroup::all();

        $clients = Client::all()->sortBy('fullname');

        return view('clientgroups.edit', compact('clientgroup', 'loyalgroups', 'clients'));
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
        $clientGroup = ClientGroup::findOrFail($id);

        $clientGroup->client_id = $request->client_id;
        $clientGroup->group_id = $request->group_id;

        $clientGroup->save();
        return redirect()->route('clientgroups.index')
            ->with('success',
             "Le Groupe de Fidélisation du Client a été mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientGroup = ClientGroup::findOrFail($id);
        $clientGroup->delete();

        return redirect()->route('clientgroups.index')->with('success', "Le client a été retiré du groupe des clients fidèles");
    }
}

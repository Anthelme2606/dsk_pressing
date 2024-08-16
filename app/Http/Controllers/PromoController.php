<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $promos = Promo::all();
        return view('promos.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Promo::create([
            'code' => $request->code,
            'percentage' => $request->percentage,
            'quota' => $request->quota,
            'ending_date' => $request->ending_date,
            'ending_time' => $request->ending_time
        ]);

        return redirect()->route('promos.index')->with('success', 'La promotion a bien été enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promo = Promo::find($id);
        return view('promos.edit', compact('promo'));
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
        $promo = Promo::find($id);
        $promo->code = $request->code;
        $promo->percentage = $request->percentage;
        $promo->ending_date = $request->ending_date;
        $promo->quota = $request->quota;
        $promo->ending_time = $request->ending_time;
        $promo->save();

        return redirect()->route('promos.index')->with('success', 'La promotion a bien été modifiée');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::find($id);
        $promo->delete();

        return redirect()->route('promos.index')->with('success', 'La promotion a bien été supprimée');
    }
}

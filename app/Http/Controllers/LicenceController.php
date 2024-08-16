<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LicenceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $licences = License::all(); //Get all licences

        foreach($licences as  $licence){
            $licence->activated_at = Carbon::parse($licence->activated_at);

            $licence->expire_at = Carbon::parse($licence->expire_at);
        }

        return view('licences.index')->with('licences', $licences);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('licences.create');
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
            'code' => 'required|max:40',
        ]);

        $licence  = License::find(1);

        if((Hash::check(request('code'), $licence->code) == true)){

            //$licence->code = null;

            $code = '';

            $licence->is_activated = 1;

            $licence->activated_at = Carbon::now();
            //$licence->activated_at = Carbon::now()->subDay(2);
            //$licence->expire_at = Carbon::now()->subDay(20);
            //$licence->expire_at = Carbon::parse($licence->activated_at)->addMonths(6);
            //$licence->expire_at = Carbon::parse($licence->activated_at)->addWeeks(1);

            //Add Year

            $licence->expire_at = Carbon::parse($licence->activated_at)->addYear();

            $year = Carbon::parse($licence->expire_at)->year;

            $month = Carbon::parse($licence->expire_at)->month;

            $day = Carbon::parse($licence->expire_at)->day;

            $code = $year.''.$month.''.$day;

            $licence->code = Hash::make($code);

            //$licence->code = $code;

            $licence->save();

            return redirect()->route('login')->with('success', 'Votre application est de nouveau actif!');

        }else{

            return redirect()->back()->with('error', 'Votre Code d\'activation est incorrect!');

        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

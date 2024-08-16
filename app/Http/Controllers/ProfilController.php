<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Create a new controller instance.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profils.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilRequest $request)
    {
        //Validate name, email and password field

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        if($user->fullname == $request->fullname && $user->email==$request->email && $user->phone_number == $request->phone_number && $user->address == $request->address){
            return back()->with("error", "Veuillez fournir des paramètres différents");
        }
        else {
            User::where('id', $user_id)
                ->update([
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                ]);
        }

        return redirect('profils')->with('success', 'Profil mis à jour');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    public function setting()
    {
        return view('profils.setting');
    }

    

    public function change_password(Request $request){
        // dd($request->old_password);
        if(Hash::check($request->old_password, Auth::user()->password)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
        } else {
            return back()->with('error', "Votre mot de passe actuel est incorrect.");
        }
        return back()->with('success', 'Votre mot de passe a été changé avec succès.');
    }

    public function updatePassword(Request $request)
    {
        //Validate password fields
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id); //Get user specified by id

        //$user->password = $request->input('password');
        //$user->save();

        if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {

            return back()->with('error', 'Votre mot de passe actuel n\'est pas correcte! Veuillez revérifier svp!');

        } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {

            return back()->with('error', 'Veuillez entrer un mot de passe non similaire à l\'actuel.');

        } else {
            //User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);

            $user->password = $request->input('new_password');

            $user->save();

            return redirect('profils')->with('success', 'Votre mot de passe a été changé');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function change_profile_image(Request $request){

        if ($request->hasfile('image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('image')->storeAs('/public/profile_images/', $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }
        // dd($fileNameToStore);
        $user = User::find(Auth::user()->id);
        $user->picture = $fileNameToStore;
        $user->save();
        return back();
    }
}

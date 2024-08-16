<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agency;
use App\Models\Pressing;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TellerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->getRoleNames()->contains("manager")){
            $users = User::where("agency_id", Auth::user()->agency_id)->role("caissier")->get();
        }else {
            $users = User::role("caissier")->get();
        }
         // Liste des caissiers ayant un role caissier


         return view('tellers.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();

        return view('tellers.create', [
            'agencies' => $agencies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate name, email and password fields
        $this->validate($request, [
            'fullname' => 'required|max:255',
            // 'firstname' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required',
            'address' => 'required',
            'agency_id' => 'required',
            'picture' => 'image|nullable',
        ]);

        if ($request->hasfile('picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('picture')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'avatar.jpg';
        }

        $user = new User();
        // $user->name = $request->input('name');
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->picture = $fileNameToStore;
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->agency_id = $request->input('agency_id');
        $user->assignRole('caissier');
        $user->save();

        //Redirect to the users.index view and display message
        return redirect()->route('tellers.index')
            ->with('success', 'Caissier ajouté avec succès.');
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
        $user = User::findOrFail($id); //Get user with specified id
        //$roles = Role::get(); //Get all roles
        $roles = Role::whereNotIn('id', array(1,2,3))->get();
        $pressings = Pressing::all();
        $agencies = Agency::all();

        return view('tellers.edit', compact('user', 'roles', 'agencies', 'pressings')); //pass user and roles data to view
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
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'fullname' => 'required|max:255',
            // 'firstname' => 'required|max:120',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required',
            'address' => 'required',
            'agency_id' => 'required',
            'picture' => 'image|nullable',
        ]);

        if ($request->hasfile('picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('picture')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'avatar.jpg';
        }

        $user->fullname = $request->input('fullname');
        // $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->agency_id = $request->input('agency_id');
        if ($request->hasfile('picture')) {
            $user->picture = $fileNameToStore;
        }

        $user->save();

        $roles = $request['roles']; //Retreive all roles

        $user->roles()->sync($roles);
        /*$roles = $request['roles']; //Retreive all roles

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }*/

        return redirect()->route('tellers.index')
               ->with('success', 'Caissier edité avec succès.');
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

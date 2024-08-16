<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agency;
use App\Models\Pressing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }


    public function index()
    {
        $users = User::where('agency_id', Auth::user()->agency_id)->get();
        return view('users.index')->with('users', $users);
    }


    public function create()
    {
        $agencies = Agency::all();
        return view('users.create', compact("agencies"));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required',
            'address' => 'required',
            'agency' => 'required',
        ]);

        $myrole = Role::findByName($request->role);


        $user = new User();
        $user->fullname =  $request->fullname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->agency_id = $request->agency;
        $user->picture = "avatar.jpg";
        $user->save();

        $user->assignRole($myrole);

        return redirect()->route('users.index')
            ->with('success',
             'Utilisateur ajouté avec succès.');
    }

    public function show($id)
    {
        return redirect('users');
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
        $user = User::findOrFail($id); //Get user with specified id
        //$roles = Role::get(); //Get all roles
        $roles = Role::whereNotIn('id', array(1))->get();
        $pressings = Pressing::all();
        $agencies = Agency::all();

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'agencies' => $agencies,
        ]);
        //return view('users.edit', compact('user', 'roles')); //pass user and roles data to view
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            //'name' => 'required|max:120',
            'fullname' => 'required|max:255',
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

        //$user->name = $request->input('name');
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone_number = $request->input('phone_number');
        $user->agency_id = $request->input('agency_id');
        $user->address = $request->input('address');
        if ($request->hasfile('picture')) {
            $user->picture = $fileNameToStore;
        }

        $user->save();

        $roles = $request['roles']; //Retreive all roles

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        // else {
        //     $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        // }

        return redirect()->route('users.index')
            ->with('success',
             'Utilisateur edité avec succès.');
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
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        if ($user->picture != 'avatar.jpeg') {
            Storage::delete('public/profile_images/'.$user->picture);
        }
        $user->delete();

        return redirect()->route('users.index')
            ->with('success',
             'Utilisateur supprimé avec succès.');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agency;
use App\Models\Pressing;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LaveurController extends Controller
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
            $users = User::where("agency_id", Auth::user()->agency_id)->role("laveur")->get();
        }else {
            $users = User::role("laveur")->get();
        }
         // Liste des caissiers ayant un role caissier


         return view('laveurs.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();

        return view('laveurs.create', [
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
        $user->assignRole('laveur');
        $user->save();

        //Redirect to the users.index view and display message
        return redirect()->route('laveurs.index')
            ->with('success', 'Laveur ajouté avec succès.');
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
        $pressings = Pressing::all();
        $agencies = Agency::all();

        return view('laveurs.edit', compact('user', 'agencies')); //pass user and roles data to view
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


        return redirect()->route('laveurs.index')
               ->with('success', 'Laveur edité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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

        return redirect()->route('laveurs.index')
            ->with('success',
             'Laveur supprimé avec succès.');
    }
}

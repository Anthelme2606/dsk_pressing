<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agency;
use App\Models\Country;
use App\Models\CodeSuffix;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\Pressing;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardAdmin extends Controller
{
    private $user;

    public function __construct(){
        $this->middleware('auth.admin');
    }

    public function dashboard(){
        $pressings = count(Pressing::all());
        $agences = count(Agency::all());
        $users = count(User::role("admin")->get());

        return view("superadmin", compact('pressings', 'agences', 'users'));
    }

    // CRUD Pressing
    public function pressing_index()
    {
        $pressings = Pressing::where('status', '=', 1)->get();
        return view('superadmin.pressings.index', compact('pressings'));
    }


    public function pressing_create()
    {
        return view('superadmin.pressings.create');
    }


    public function pressing_store(Request $request)
    {
        Pressing::create(
            [
                "name" => $request->name,
                "details" => $request->details
            ]
        );

        return redirect()->route('superadmin.pressings.index')->with('success', 'Votre pressing a été créé avec succès');
    }

    public function pressing_show($id)
    {
        return redirect()->route('superadmin.pressings.index');
    }


    public function pressing_edit($id)
    {
        $pressing = Pressing::findOrFail($id);
        return view('superadmin.pressings.edit', compact('pressing'));
    }


    public function pressing_update(Request $request, $id)
    {
        $pressing = Pressing::findOrFail($id);

        $pressing->name = $request->name;
        $pressing->details = $request->details;

        $pressing->save();

        return redirect()->route('superadmin.pressings.index')->with('success', 'Pressing mise à jour avec succès');
    }


    public function pressing_destroy($id)
    {
        $pressing = Pressing::findOrFail($id);
        $pressing->delete();

        return redirect()->route('superadmin.pressings.index')->with('success', 'Pressing supprimé avec succès');
    }

    // CRUD Agences
    public function agence_index()
    {
        $agencies = Agency::all();
        return view('superadmin.agences.index', compact('agencies'));
    }


    public function agence_create()
    {
        $countries = Country::all();
        $pressings = Pressing::where('status', '=', 1)->get();

        return view('superadmin.agences.create', compact('countries', 'pressings'));
    }


    public function agence_store(Request $request)
    {

        $agence = new Agency;
        $agence->name = $request->name;
        $agence->address = $request->address;
        $agence->contact = $request->phone;
        $agence->pressing_id = $request->pressing_id;
        $agence->country_id = $request->country_id;
        $agence->status = true;
        $agence->save();

        // Code suffixe
        $suffix = new CodeSuffix;
        $suffix->title = substr($request->name, 0, 2);
        $suffix->agency_id = $agence->id;
        $suffix->save();

        return redirect()->route('superadmin.agences.index')->with('success', 'Votre agence a été créée avec succès');
    }

    public function agence_show($id)
    {
        return redirect()->route('superadmin.agences.index');
    }


    public function agence_edit($id)
    {
        $agence = Agency::findOrFail($id);
        $countries = Country::all();
        return view('superadmin.agences.edit', compact('agence', 'countries'));
    }

    public function agence_update(Request $request, $id)
    {
        $agence = Agency::findOrFail($id);

        $agence->name = $request->name;
        $agence->address = $request->address;
        $agence->contact = $request->contact;
        $agence->country_id = $request->country_id;

        $agence->save();

        $code_suffix = CodeSuffix::where("agency_id", $id)->get()->first();
        if(count($code_suffix)>0){
            $code_suffix[0]->title = substr($request->name, 0, 2);
            $code_suffix[0]->save();
        }


        return redirect()->route('superadmin.agences.index')->with('success', 'Agence mise à jour avec succès');

    }

    public function agence_destroy($id)
    {
        $agency = Agency::findOrFail($id)->delete();
        $code_suffix = CodeSuffix::where("agency_id", $id)->get()->first();
        if(count($code_suffix)>0){
            $code_suffix[0]->delete();
        }

        return redirect()->route('superadmin.agences.index')->with('success', 'Agence supprimée avec succès');
    }

    // USERS
    public function user_index()
    {
        $users = User::all();
        return view('superadmin.users.index')->with('users', $users);
    }


    public function user_create()
    {
        $agencies = Agency::all();
        return view('superadmin.users.create', compact("agencies"));
    }

    public function user_store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:255',
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

        return redirect()->route('superadmin.users.index')
            ->with('success',
             'Utilisateur ajouté avec succès.');
    }

    public function user_show($id)
    {
        return redirect('superadmin.users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function user_edit($id)
    {
        $user = User::findOrFail($id); //Get user with specified id
        //$roles = Role::get(); //Get all roles
        $roles = Role::whereNotIn('id', array(1))->get();
        $pressings = Pressing::all();
        $agencies = Agency::all();

        return view('superadmin.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'agencies' => $agencies,
        ]);
        //return view('users.edit', compact('user', 'roles')); //pass user and roles data to view
    }


    public function user_update(Request $request, $id)
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

        return redirect()->route('superadmin.users.index')
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
    public function user_destroy($id)
    {
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        if ($user->picture != 'avatar.jpeg') {
            Storage::delete('public/profile_images/'.$user->picture);
        }
        $user->delete();

        return redirect()->route('superadmin.users.index')
            ->with('success',
             'Utilisateur supprimé avec succès.');
    }

    public function profil_index(){
        return view("profils.index3");
    }

    public function profil_store(Request $request){
        $admin_id = Auth::guard("admin")->user()->id;
        $admin = Admin::find($user_id);
        if($admin->fullname == $request->fullname && $admin->email==$request->email){
            return back()->with("error", "Veuillez fournir des paramètres différents");
        }
        else {
            Admin::where('id', $user_id)
                ->update([
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                ]);
        }

        return redirect('profils')->with('success', 'Profil mis à jour');
    }

    public function profil_setting(){
        return view('profils.setting3');
    }

    public function profil_change_password(Request $request){
        if(Hash::check($request->old_password, Auth::guard("admin")->user()->password)){
            $admin = Admin::find(Auth::guard('admin')->user()->id);
            $admin->password = Hash::make($request->new_password);
            $admin->save();
        } else {
            return back()->with('error', "Votre mot de passe actuel est incorrect.");
        }
        return back()->with('success', 'Votre mot de passe a été changé avec succès.');
    }

    public function profil_update_password(Request $request){
        //Validate password fields
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $admin_id = Auth::guard('admin')->user()->id;
        $admin = User::findOrFail($user_id); //Get user specified by id

        //$user->password = $request->input('password');
        //$user->save();

        if ((Hash::check(request('old_password'), Auth::guard('admin')->user()->password)) == false) {

            return back()->with('error', 'Votre mot de passe actuel n\'est pas correcte! Veuillez revérifier svp!');

        } else if ((Hash::check(request('new_password'), Auth::guard('admin')->user()->password)) == true) {

            return back()->with('error', 'Veuillez entrer un mot de passe non similaire à l\'actuel.');

        } else {
            //User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);

            $admin->password = $request->input('new_password');

            $admin->save();

            return redirect('profils')->with('success', 'Votre mot de passe a été changé');
        }
    }

    public function profil_change_profile_image(Request $request){
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
            $path = $request->file('image')->storeAs('public/storage/', $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }
        // dd($fileNameToStore);
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->picture = $fileNameToStore;
        $admin->save();
        return back();
    }

}


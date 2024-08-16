<?php

namespace App\Http\Controllers\Auth\Admin;
use App\Models\Sponsorship;
use App\Models\Account;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\RegisterRequest as RegisterRequest;

class AuthController extends Controller
{
    public function login(Request $request){
        return view('auth.admin.login');
    }

    public function authenticate(Request $request){
        $request->validate(
            [
                "email" => ['required'],
                "password" => ['required']
            ]
        );

        if(Auth::guard('admin')->attempt($request->only('email','password'))){

            return redirect()
                ->intended(route('admin-dashboard'))
                ->with('status','Vous êtes connectées!');
        }


        //Authentication failed...
        return $this->loginFailed();

    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Echec de la connexion; veuillez rééssayer !');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()
            ->route('superadmin.login')
            ->with('status','Vous avez été déconnectées!');

    }

    public function register(Request $request){
        return view('auth.client.register');
    }
}

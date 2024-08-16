<?php

namespace App\Http\Controllers\Auth\Client;
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
        return view('auth.client.login');
    }

    public function authenticate(Request $request){
        $request->validate(
            [
                "phone_number" => ['required'],
                "password" => ['required']
            ]
        );

        // if(filter_var($request->phone_number, FILTER_VALIDATE_EMAIL)){
        //     if(Auth::guard('client')->attempt($request->only('email','password'))){

        //         return redirect()
        //             ->intended(route('clientarea'))
        //             ->with('status','Vous êtes connectées!');
        //     }
        // } else {
            if(Auth::guard('client')->attempt($request->only('phone_number','password'))){

                return redirect()
                    ->intended(route('clientarea'))
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
        Auth::guard('client')->logout();
        return redirect()
            ->route('client.login')
            ->with('status','Vous avez été déconnectés!');

    }

    public function register(Request $request){
        return view('auth.client.register');
    }


    public function store(RegisterRequest $request){
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

        $sponsorship = new Sponsorship();
        $sponsorship->sponsor_code = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
        $sponsorship->referral_code = "";
        $sponsorship->save();

        $account = new Account();
        $account->num = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
        $account->amount = 0;
        $account->status = false;
        $account->save();

        $client = new Client();
        $client->fullname = $request->fullname;
        // $client->picture = $fileNameToStore;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->phone_number = $request->phone_number;

        // $client->fixe_number = $request->fixe_number;
        $client->birthday = $request->birthday;
        $client->waiting_for = $request->waiting_for;
        $client->city = $request->city;

        $client->address = $request->address;
        $client->sponsorship_code = $sponsorship->id;
        $client->account_id = $account->id;
        $client->status = true;

        $client->save();

        return redirect()->route('client.login')->with('success', 'Votre compte a été créé avec succès');
    }

    public function register_with_code(Request $request, String $code){
        $sponsorship = Sponsorship::where("sponsor_code", $code)->get()->first();
        $client = Client::where('sponsorship_code', $sponsorship->id)->get()->first();
        $account = Account::where('account_id', $client->account_id)->get()->first();
        $account->amount += 500;
        $account->save();
    }
}

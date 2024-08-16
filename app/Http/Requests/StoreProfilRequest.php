<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required',
        ];
    }

    public function messages(){
        return [
          "fullname.required" => "Le nom complet est requis",
          "email.required" => "L'adresse email est requise",
          "address.required" => "L'adresse est requise",
          "phone_number.required" => "Le numero de téléphone est requis",
        ];
    }
}

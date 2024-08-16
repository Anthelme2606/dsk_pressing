<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "fullname" => "required|string",
            "password" => "required",
            "phone_number" => "required|unique:clients",
            "email" => "unique:clients"
        ];
    }

    public function messages(){
        return [
            "fullname.required" => "Le nom complet est requis",
            "password.required" => "Le mot de passe est requis",
            "phone_number.unique" => "Ce numéro de téléphone a déjà été utilisé sur cette plateforme. Veuillez en choisir un autre s'il vous plaît",
            "phone_number.required" => "Le numéro de téléphone est requis",
            "email.unique" => "Cet e-mail a déjà été utilisé sur cette plateforme. Veuillez en choisir un autre s'il vous plaît"
        ];
    }
}

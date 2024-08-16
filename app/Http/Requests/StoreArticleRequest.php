<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => "required|unique:articles",
            'classic_price' => "required",
            'repass_price' => "required",
            'express_price' => "required"
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => "cet articl existe déjà",
            'name.required' => "Le nom de l'article est requis",
            // 'description.required'  => "La courte description est requise",
            'classic_price.required' => "Renseignez le prix de lavage classique",
            'repass_price.required' => "Renseignez le prix de repassage",
            'express_price.required' => "Renseignez le prix de lavage express",
        ];
    }
}

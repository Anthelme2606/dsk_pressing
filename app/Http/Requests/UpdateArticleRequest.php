<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => "required",
            'short_description'  => "required",
            'price' => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Le nom de l'article est requis",
            'short_description.required'  => "La courte description est requise",
            'price.required' => "Le prix de l'article est requise",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'fullname' => 'required|max:120',
            'phone_number' => 'required|unique:clients',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Le nom complet est requis',
            'phone_number.required' => 'Le numero de téléphone est requis',
            'phone_number.unique' => 'Le numero de téléphone existe déjà',
        ];
    }
}

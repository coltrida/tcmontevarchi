<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReimpostaRequest extends FormRequest
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
            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'Il campo password e il campo conferma password non coincidono',
            'password.required' => 'Il campo password è obbligatorio',

        ];
    }
}

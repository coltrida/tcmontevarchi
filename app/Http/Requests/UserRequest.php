<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nome' => 'required',
            'cognome' => 'required',
            'username' => 'required|min:3',
            'anno' => 'required|integer',
            'telefono' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Il campo nome è obbligatorio',
            'cognome.required' => 'Il campo cognome è obbligatorio',
            'username.required' => 'Il campo username è obbligatorio',
            'username.min' => 'Il campo username deve avere almeno 3 caratteri',
            'anno.required' => 'Il campo anno è obbligatorio',
            'anno.integer' => 'Il campo anno deve essere numerico',
            'telefono.required' => 'Il campo telefono è obbligatorio',
            'email.required' => 'Il campo email è obbligatorio',
            'email.email' => 'Il campo email deve avere il formato di una mail',
            'password.required' => 'Il campo password è obbligatorio',

        ];
    }
}

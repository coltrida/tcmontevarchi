<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SociRequest extends FormRequest
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
            'anno' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Il campo nome è obbligatorio',
            'cognome.required' => 'Il campo cognome è obbligatorio',
            'anno.required' => 'Il campo anno è obbligatorio',
            'anno.integer' => 'Il campo anno deve essere numerico'
        ];
    }
}

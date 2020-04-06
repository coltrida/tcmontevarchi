<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'email' => $this->email,
            'username' => $this->username,
            'telefono' => $this->telefono,
            'credito' => $this->credito,
            'amici' => $this->amici,
            'anno' => $this->anno,
            'privilegi' => $this->privilegi,
            'certificato' => Carbon::parse($this->certificato)->format('d/m/Y')
        ];
    }
}

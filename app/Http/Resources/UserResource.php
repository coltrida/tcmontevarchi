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
            'id' => $this->id,
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'email' => $this->email,
            'username' => $this->username,
            'telefono' => $this->telefono,
            'credito' => $this->credito,
            'amici' => $this->amici,
            'anno' => $this->anno,
            'privilegi' => $this->privilegi,
<<<<<<< HEAD
            // 'certificato' => Carbon::parse($this->certificato)->format('d/m/Y')
=======
         //   'certificato' => Carbon::parse($this->certificato)->format('d/m/Y')
>>>>>>> 4d8c2d7e4e6325282496f41ca4465cb7af1347c1
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SociResource extends JsonResource
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
            'anno' => $this->anno,
            'status' => $this->tipo
        ];
    }
}

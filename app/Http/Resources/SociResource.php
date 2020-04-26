<?php

namespace App\Http\Resources;

use App\Models\Socio;
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
            'id' => $this->id,
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'anno' => $this->anno,
            'status' => $this->tipo,
            'telegram' => $this->user_id,
            'foto' => 'http://tcmontevarchi.altervista.org/storage/soci/'.$this->id.'.jpg',
            'totSoci' => Socio::count()
        ];
    }
}

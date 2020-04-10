<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PrenotazioniResource extends JsonResource
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
            'username1' => $this->username1,
            'username2' => $this->username2,
            'username3' => $this->username3,
            'username4' => $this->username4,
            'campo' => $this->campo,
            'dataprenotazione' => Carbon::parse($this->dataprenotazione)->format('d/m/Y'),
            'oraon' => $this->oraon,
            'doppio' => $this->doppio == 0 ? 'S' : 'D'
        ];
    }
}

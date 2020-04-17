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
            'id' => $this->id,
            'username1' => $this->username1,
            'username2' => $this->username2,
            'username3' => $this->username3,
            'username4' => $this->username4,
            'campo' => $this->campo,
            'datapren' => $this->dataprenotazione,
            'dataprenotazione' => Carbon::parse($this->dataprenotazione)->format('d/m/Y'),
            'oraon' => $this->oraon,
            'full' => ($this->username1 && $this->username2 && $this->doppio == 0) ||
                ($this->username1 && $this->username2 && $this->username3 && $this->username4 && $this->doppio == 1) ? true : false,
            'doppio' => $this->doppio == 0 ? 'S' : 'D'
        ];
    }
}

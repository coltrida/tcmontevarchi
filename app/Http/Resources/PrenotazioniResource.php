<?php

namespace App\Http\Resources;

use App\User;
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
            'id1' => $this->username1,
            'id2' => $this->username2,
            'id3' => $this->username3,
            'id4' => $this->username4,
            'username1' => $this->username1 ? User::where('id', $this->username1)->pluck('cognome')[0] : '',
            'username2' => $this->username2 ? User::where('id', $this->username2)->pluck('cognome')[0] : '',
            'username3' => $this->username3 ? User::where('id', $this->username3)->pluck('cognome')[0] : '',
            'username4' => $this->username4 ? User::where('id', $this->username4)->pluck('cognome')[0] : '',
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

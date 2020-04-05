<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $table = 'soci';

    protected $fillable = [
        'nome', 'cognome', 'username', 'anno', 'status', 'ricaricato'
    ];

    public function getTipoAttribute()
    {
        if ($this->status == 0){
            return 'normale';
        } elseif ($this->status == 1){
            return 'gratis';
        } elseif ($this->status == 2){
            return 'illimitato';
        } elseif ($this->status == 4) {
            return 'admin';
        }
    }
}

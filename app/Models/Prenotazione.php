<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    protected $table = 'prenotazioni';

    protected $fillable = [
        'username1', 'username2', 'username3', 'username4', 'campo', 'dataprenotazione', 'oraon', 'doppio'
    ];
}

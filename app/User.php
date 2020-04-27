<?php

namespace App;

use App\Models\Socio;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cognome', 'username', 'telefono', 'credito', 'amici', 'anno', 'privilegi', 'certificato', 'email', 'password', 'user_id', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getEtaAttribute()
    {
        $annoAttuale = Carbon::now()->year;
        return $annoAttuale - $this->anno;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getStatoAttribute()
    {
       // $stato = Socio::where('username', auth()->user()->username)->pluck('status');
        if($this->status == 0){
            return 'normale';
        } elseif ($this->status == 1){
            return 'admin';
        } elseif ($this->status == 2){
            return 'special';
        } elseif ($this->status == 3){
            return 'gratis';
        } elseif ($this->status == 4){
            return 'illimitati';
        };
    }

}

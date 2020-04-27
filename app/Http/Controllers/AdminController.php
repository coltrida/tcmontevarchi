<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ricaricaCredito(User $user, Request $request)
    {
        $user->credito += $request->input('importo');
        $user->save();
    }

    public function stornaCredito(User $user, Request $request)
    {
        $user->credito -= $request->input('importo');
        $user->save();
    }

    public function inserisciSocio(Request $request)
    {
        $socio = new Socio();
        $socio->nome = $request->input('nome');
        $socio->cognome = $request->input('cognome');
        $socio->anno = $request->input('anno');
        $socio->status = $request->input('stato');
        $socio->save();
    }

    public function caricaGratis()
    {
        $utentiGratis = User::where('status', 3)->get();
        foreach ($utente as $utentiGratis){
            $utente->privilegi = 7;
            $utente->save();
        }
    }

    public function prenotazioneParticolare(Request $request)
    {

    }

    public function cancellazioneParticolare(Request $request)
    {

    }
}

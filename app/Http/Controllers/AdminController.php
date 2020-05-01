<?php

namespace App\Http\Controllers;

use App\Models\Prenotazione;
use App\Models\Socio;
use App\User;
use Carbon\Carbon;
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
        $id = $request->input('id');
        $campo = $request->input('campo');
        $dataIn = Carbon::parse($request->input('dataIn'));
        $dataOut = Carbon::parse($request->input('dataOut'));
        $oraIn =  intval(substr($request->input('oraIn'), 0, 2));
        $oraOut = intval(substr($request->input('oraOut'), 0, 2));
        if($dataIn == $dataOut){
            for ($i = $oraIn; $i <= $oraOut; $i++){
                $prenotazione = new Prenotazione();
                $prenotazione->username1 = $id;
                $prenotazione->username2 = $id;
                $prenotazione->campo = $campo;
                $prenotazione->doppio = 0;
                $prenotazione->dataprenotazione = $request->input('dataIn');
                $prenotazione->oraon = $i;
                $prenotazione->save();
            }
        } else {
            for ($j = $oraIn; $j <= 22; $j++){
                $prenotazione = new Prenotazione();
                $prenotazione->username1 = $id;
                $prenotazione->username2 = $id;
                $prenotazione->campo = $campo;
                $prenotazione->doppio = 0;
                $prenotazione->dataprenotazione = $dataIn->format('Y-m-d');
                $prenotazione->oraon = $j;
                $prenotazione->save();
            }
            $dataIn = $dataIn->addDay();
            while($dataIn < $dataOut) {
                $dataInCorso = $dataIn->format('Y-m-d');
                    for ($k = 9; $k <= 22; $k++){
                        $prenotazione = new Prenotazione();
                        $prenotazione->username1 = $id;
                        $prenotazione->username2 = $id;
                        $prenotazione->campo = $campo;
                        $prenotazione->doppio = 0;
                        $prenotazione->dataprenotazione = $dataInCorso;
                        $prenotazione->oraon = $k;
                        $prenotazione->save();
                    }
                $dataIn = $dataIn->addDay();
            }
            for ($z = 9; $z <= $oraOut; $z++){
                $prenotazione = new Prenotazione();
                $prenotazione->username1 = $id;
                $prenotazione->username2 = $id;
                $prenotazione->campo = $campo;
                $prenotazione->doppio = 0;
                $prenotazione->dataprenotazione = $dataOut->format('Y-m-d');
                $prenotazione->oraon = $z;
                $prenotazione->save();
            }
        }
    }

    public function cancellazioneParticolare(Request $request)
    {
        $campo = $request->input('campo');
        $dataIn = Carbon::parse($request->input('dataIn'));
        $dataOut = Carbon::parse($request->input('dataOut'));
        $oraIn =  intval(substr($request->input('oraIn'), 0, 2));
        $oraOut = intval(substr($request->input('oraOut'), 0, 2));
        if($dataIn == $dataOut){
            for ($i = $oraIn; $i <= $oraOut; $i++){
                $prenotazione = Prenotazione::where([
                    ['campo', $campo],
                    ['dataprenotazione', $request->input('dataIn')],
                    ['oraon', $i]
                ])->delete();
            }
        } else {
            for ($j = $oraIn; $j <= 22; $j++){
                $prenotazione = Prenotazione::where([
                    ['campo', $campo],
                    ['dataprenotazione', $request->input('dataIn')],
                    ['oraon', $j]
                ])->delete();
            }
            $dataIn = $dataIn->addDay();
            while($dataIn < $dataOut) {
                $dataInCorso = $dataIn->format('Y-m-d');
                for ($k = 9; $k <= 22; $k++){
                    $prenotazione = Prenotazione::where([
                        ['campo', $campo],
                        ['dataprenotazione', $dataInCorso],
                        ['oraon', $k]
                    ])->delete();
                }
                $dataIn = $dataIn->addDay();
            }
            for ($z = 9; $z <= $oraOut; $z++){
                $prenotazione = Prenotazione::where([
                    ['campo', $campo],
                    ['dataprenotazione', $dataOut->format('Y-m-d')],
                    ['oraon', $z]
                ])->delete();
            }
        }
    }
}

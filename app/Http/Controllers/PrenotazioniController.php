<?php

namespace App\Http\Controllers;

use App\Events\PrenotazioneEvent;
use App\Http\Resources\PrenotazioniResource;
use App\Models\Prenotazione;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrenotazioniController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['only' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return PrenotazioniResource::collection(Prenotazione::where([
            ['dataprenotazione', $request->input('dataprenotazione')],
            ['campo', $request->input('campo')],
        ])->get());
    }

    public function full(Request $request)
    {
        $pren = Prenotazione::where([
            ['dataprenotazione', $request->input('dataprenotazione')],
            ['campo', $request->input('campo')],
            ['oraon', $request->input('oraon')],
        ])->first();
        //dd($pren);
        if($pren){
            return new PrenotazioniResource($pren);
        } else{
            return null;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $esistePrenotazione = Prenotazione::where([
            ['dataprenotazione', $request->input('dataprenotazione')],
            ['campo', $request->input('campo')],
            ['oraon', $request->input('oraon')],
        ])->first();
        if($esistePrenotazione){
            broadcast(new PrenotazioneEvent($esistePrenotazione->id))->toOthers();
            return $this->update($request, $esistePrenotazione);
        } else {
            $request['username1'] = $request->input('username');
            $prenotazione = Prenotazione::create($request->all());
            broadcast(new PrenotazioneEvent($prenotazione->id))->toOthers();
            return response($prenotazione, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prenotazione  $prenotazione
     * @return \Illuminate\Http\Response
     */
    public function show(Prenotazione $prenotazioni)
    {
        return new PrenotazioniResource($prenotazioni);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prenotazione  $prenotazione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prenotazione $prenotazione)
    {
        $username = $request->input('username');

        //     singolo               //
        if ($request->input('doppio') == 'S'){

            if (!$prenotazione->username1){
                $prenotazione->username1 = $username;
            } else {
                $prenotazione->username2 = $username;
            }
        } else {
        //     doppio              //
            if (!$prenotazione->username1){
                $prenotazione->username1 = $username;
            } elseif(!$prenotazione->username2) {
                $prenotazione->username2 = $username;
            } elseif(!$prenotazione->username3) {
                $prenotazione->username3 = $username;
            } elseif(!$prenotazione->username4) {
                $prenotazione->username4 = $username;
            }
        }

        $prenotazione->save();
        return response($prenotazione, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prenotazione  $prenotazione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prenotazione $prenotazioni)
    {
        $username = auth()->user()->username;
        //dd($username);
        if(
            ($prenotazioni->username1 == $username
            && !$prenotazioni->username2
            && !$prenotazioni->username3
            && !$prenotazioni->username4
            ) || ($prenotazioni->username2 == $username
                && !$prenotazioni->username1
                && !$prenotazioni->username3
                && !$prenotazioni->username4
            ) || ($prenotazioni->username3 == $username
                && !$prenotazioni->username1
                && !$prenotazioni->username2
                && !$prenotazioni->username4
            ) || ($prenotazioni->username4 == $username
                && !$prenotazioni->username1
                && !$prenotazioni->username3
                && !$prenotazioni->username2
            )
        ) {
            $prenotazioni->delete();
        } elseif($prenotazioni->username1 == $username) {
            $prenotazioni->username1 = null;
            $prenotazioni->save();
        } elseif ($prenotazioni->username2 == $username) {
            $prenotazioni->username2 = null;
            $prenotazioni->save();
        } elseif ($prenotazioni->username3 == $username) {
            $prenotazioni->username3 = null;
            $prenotazioni->save();
        } elseif ($prenotazioni->username4 == $username) {
            $prenotazioni->username4 = null;
            $prenotazioni->save();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/dimenticata/{indirizzo}', 'MailController@dimenticata');
Route::delete('/prenotazioni/{prenotazioni}/{user}/{nuovocredito}/{nuoviprivilegi}', 'PrenotazioniController@destroy')->name('prenotazioni.destroy');
Route::post('/prenotazioni/{user}', 'PrenotazioniController@store')->name('prenotazioni.store');
Route::apiResource('/prenotazioni', 'PrenotazioniController');
Route::post('/prenotazionispecifiche', 'PrenotazioniController@index');
Route::post('/full', 'PrenotazioniController@full');
Route::post('/inviaMessaggioSocio/{user}', 'SociController@inviaTelegram');
Route::get('/soci/visualizzaDinamica/{valore?}', 'SociController@index')->name('soci.index');
Route::apiResource('/soci', 'SociController');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('users/{valore?}', 'AuthController@index')->name('users');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup')->name('signup');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh')->name('refresh');
    Route::post('me', 'AuthController@me')->name('me');
    Route::post('foto/{user}', 'AuthController@foto')->name('foto');
    Route::patch('update/{user}', 'AuthController@update')->name('update');
    Route::get('prenotazioni', 'AuthController@prenotazioni');
    Route::get('prenotazioniUtenteSelezionato/{id}', 'AuthController@prenotazioniUtenteSelezionato');
    Route::post('payload', 'AuthController@payload')->name('payload');
    Route::post('inviaNews', 'NewsController@invia');

});

Route::group([
    'prefix' => 'admin'
], function () {
    Route::post('ricaricaCredito/{user}', 'AdminController@ricaricaCredito');
    Route::post('stornaCredito/{user}', 'AdminController@stornaCredito');
    Route::post('inserisciSocio', 'AdminController@inserisciSocio');
    Route::post('prenParticolare', 'AdminController@prenotazioneParticolare');
    Route::post('cancParticolare', 'AdminController@cancellazioneParticolare');
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/prenotazioni', 'PrenotazioniController');
Route::post('/prenotazionispecifiche', 'PrenotazioniController@index');
Route::post('/full', 'PrenotazioniController@full');
Route::apiResource('/soci', 'SociController');


Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('users', 'AuthController@index')->name('users');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup')->name('signup');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh')->name('refresh');
    Route::post('me', 'AuthController@me')->name('me');
    Route::patch('update/{user}', 'AuthController@update')->name('update');

    Route::post('payload', 'AuthController@payload')->name('payload');

});

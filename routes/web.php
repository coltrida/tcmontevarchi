<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
/*Route::get('/reimposta/{indirizzo}', 'AuthController@reimposta');*/
Route::post('/reimposta', 'AuthController@reimposta');
Route::post('/salvareimpostazioni', 'AuthController@salvareimpostazioni')->name('reimposta');

Route::get('/caricaGratis', 'AdminController@caricaGratis');

// per le spa bisogno mettere questo
Route::view('/{any}', 'home');
// e anche un secondo livello di rotta per il metodo show ad esempio
Route::view('/{any}/{any1}', 'home');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

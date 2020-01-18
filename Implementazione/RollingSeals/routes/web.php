<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/// Corso API endpoints
Route::get( '/corsi', 'CorsoController@index' );
Route::get( '/corsi/{id}', 'CorsoController@show' );
Route::delete( '/corsi/{id}', 'CorsoController@destroy' );
Route::post( '/corsi', 'CorsoController@store' );
Route::patch( '/corsi', 'CorsoController@update' );

/// Ateneo API endpoints
Route::get( '/atenei', 'AteneoController@index' );
Route::get( '/atenei/{id}', 'AteneoController@show' );
Route::delete( '/atenei/{id}', 'AteneoController@destroy' );
Route::post( '/atenei', 'AteneoController@store' );
Route::patch( '/atenei', 'AteneoController@update' );

/// Commento API endpoints
Route::get( '/commenti', 'CommentoController@index' );
Route::get( '/commenti/{id}', 'CommentoController@show' );
Route::delete( '/commenti/{id}', 'CommentoController@destroy' );
Route::post( '/commenti', 'CommentoController@store' );
Route::patch( '/commenti', 'CommentoController@update' );

/// Esame API endpoints
Route::get( '/esami', 'EsameController@index' );
Route::get( '/esami/{id}', 'EsameController@show' );
Route::delete( '/esami/{id}', 'EsameController@destroy' );
Route::post( '/esami', 'EsameController@store' );
Route::patch( '/esami', 'EsameController@update' );

/// Recensione API endpoints
Route::get( '/recensioni', 'RecensioneController@index' );
Route::get( '/recensioni/{id}', 'RecensioneController@show' );
Route::delete( '/recensioni/{id}', 'RecensioneController@destroy' );
Route::post( '/recensioni', 'RecensioneController@store' );
Route::patch( '/recensioni', 'RecensioneController@update' );

/// Risposta API endpoints
Route::get( '/risposte', 'RispostaController@index' );
Route::get( '/risposte/{id}', 'RispostaController@show' );
Route::delete( '/risposte/{id}', 'RispostaController@destroy' );
Route::post( '/risposte', 'RispostaController@store' );
Route::patch( '/risposte', 'RispostaController@update' );

/// Versione API endpoints
Route::get( '/versione', 'VersioneController@index' );
Route::get( '/versione/{id}', 'VersioneController@show' );
Route::delete( '/versione/{id}', 'RispostaController@destroy' );
Route::post( '/versione', 'VersioneController@store' );
Route::patch( '/versione', 'RispostaController@update' );
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/// Corso API endpoints
Route::get( '/courses', 'CorsoController@index' );
Route::get( '/courses/{id}', 'CorsoController@show' );
Route::get( '/courses/{id}/exams', 'CorsoController@getExams' );
Route::delete( '/courses/{id}', 'CorsoController@destroy' );
Route::post( '/courses', 'CorsoController@store' );
Route::patch( '/courses/{id}', 'CorsoController@update' );
Route::put( '/courses/{id}', 'CorsoController@edit' );

/// Ateneo API endpoints
Route::get( '/universities', 'AteneoController@index' );
Route::get( '/universities/{id}', 'AteneoController@show' );
Route::delete( '/universities/{id}', 'AteneoController@destroy' );
Route::post( '/universities', 'AteneoController@store' );
Route::put( '/universities/{id}', 'AteneoController@store' );
Route::patch( '/universities/{id}', 'AteneoController@update' );

/// Commento API endpoints
Route::get( '/commenti', 'CommentoController@index' );
Route::get( '/commenti/{id}', 'CommentoController@show' );
Route::delete( '/commenti/{id}', 'CommentoController@destroy' );
Route::post( '/commenti', 'CommentoController@store' );
Route::patch( '/commenti', 'CommentoController@update' );

/// Esame API endpoints
Route::get( '/exams', 'EsameController@index' );
Route::get( '/exams/{id}', 'EsameController@show' );
Route::get( '/exams/{id}/materials', 'EsameController@getMaterials' );
Route::delete( '/exams/{id}', 'EsameController@destroy' );
Route::post( '/exams', 'EsameController@store' );
Route::patch( '/exams/{id}', 'EsameController@update' );
Route::put( '/exams/{id}', 'EsameController@edit' );

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

/// Materiale API endpoints
Route::get( '/materials', 'MaterialeController@index' );
Route::get( '/materials/download/{id}', 'MaterialeController@download' );
Route::delete( '/materials/{id}', 'MaterialeController@destroy' );
Route::post( '/materials', 'MaterialeController@store' );
Route::patch( '/materials', 'MaterialeController@update' );

/// Versione API endpoints
Route::get( '/versione', 'VersioneController@index' );
Route::get( '/versione/{id}', 'VersioneController@show' );
Route::delete( '/versione/{id}', 'RispostaController@destroy' );
Route::post( '/versione', 'VersioneController@store' );
Route::patch( '/versione', 'RispostaController@update' );
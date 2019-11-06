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

Route::get('/', 'HomeController@home');

Auth::routes();
Route::get('/integrations','IntegrationsController@index')->middleware('auth');
Route::get('/approbations','ApprobationsController@index')->middleware('auth');
Route::get('/reclamations','ReclamationsController@index')->middleware('auth');
Route::post('/integration/add','IntegrationsController@store')->middleware('auth');
Route::post('/approbation/add','ApprobationsController@store')->middleware('auth');
Route::post('/reclamations/filter','ReclamationsController@filter');
Route::post('/accessoires/filter','AccessoiresController@filter');
Route::post('/fournisseurs/filter','FournisseursController@filter');
Route::get('/prnpriview/{id}','CampionariosController@print');

Route::post('/reclamation/add','ReclamationsController@store');
Route::get('/campionarios','CampionariosController@index')->middleware('auth');
Route::post('/campionario/add','CampionariosController@store')->middleware('auth');
Route::post('/campionario/filter','CampionariosController@filter')->middleware('auth');
Route::post('/integrations/filtre','IntegrationsController@filtre')->middleware('auth');
Route::post('/campionario/fichecontrole/add','FichecontrolesController@store')->middleware('auth');
Route::get('/campionario/bloque/{id}','CampionariosController@bloque')->middleware('auth');
Route::get('/campionario/debloque/{id}','CampionariosController@debloque')->middleware('auth');
Route::post('/accessoire/add','AccessoiresController@store')->middleware('auth');
Route::post('/fournisseur/add','FournisseursController@store')->middleware('auth');
Route::get('/fournisseur/delete/{id}','FournisseursController@destroy')->middleware('auth');
Route::post('/fournisseur/update/{id}','FournisseursController@update')->middleware('auth');
Route::get('/accessoire/delete/{id}','AccessoiresController@destroy')->middleware('auth');
Route::post('/accessoire/update/{id}','AccessoiresController@update')->middleware('auth');
Route::get('/accessoires','AccessoiresController@index')->middleware('auth');
Route::get('/fournisseurs','FournisseursController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/accessoire/print', 'AccessoiresController@printed')->middleware('auth');
Route::post('/fournisseur/print', 'FournisseursController@printed')->middleware('auth');
Route::post('/campionario/print', 'CampionariosController@printed')->middleware('auth');
Route::post('/reclamation/print', 'ReclamationsController@printed')->middleware('auth');
Route::post('/integration/print', 'IntegrationsController@printed')->middleware('auth');
Route::post('/approbation/print', 'ApprobationsController@printed')->middleware('auth');
Route::post('/fichecontrole/print/{id}', 'FichecontrolesController@printed')->middleware('auth');
Route::post('//reclamation/modify/{id}', 'ReclamationsController@edit')->middleware('auth');

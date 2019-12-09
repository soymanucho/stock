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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//CLIENTE
Route::get('/clientes/', 'ClientController@show')->name('client-show');
Route::get('/clientes/nuevo/', 'ClientController@new')->name('client-new');
Route::post('/clientes/nuevo/', 'ClientController@save')->name('client-save');
Route::get('/clientes/{client}/editar/', 'ClientController@edit')->name('client-edit');
Route::put('/clientes/{client}/editar/', 'ClientController@update')->name('client-update');
Route::get('/clientes/{client}','ClientController@detail')->name('client-detail');

Route::get('/clientesApi/', 'ClientController@datatableApi')->name('client-api');

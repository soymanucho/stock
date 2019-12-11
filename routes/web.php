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

//CLIENTE
Route::get('/productos/', 'ProductController@show')->name('product-show');
Route::get('/productos/nuevo/', 'ProductController@new')->name('product-new');
Route::post('/productos/nuevo/', 'ProductController@save')->name('product-save');
Route::get('/productos/{product}/editar/', 'ProductController@edit')->name('product-edit');
Route::put('/productos/{product}/editar/', 'ProductController@update')->name('product-update');
Route::get('/productos/{product}','ProductController@detail')->name('product-detail');

Route::get('/productosApi/', 'ProductController@datatableApi')->name('product-api');

//CONTACTO
Route::get('/clientes/{client}/contactos/nuevo','ContactController@new')->name('contact-new');
Route::post('/clientes/{client}/contactos/nuevo','ContactController@save')->name('contact-save');

//LOCALIDADES
Route::post('/api/localidades/', 'LocationController@selectApi')->name('location-api');

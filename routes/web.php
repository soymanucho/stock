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

//MARCAS
Route::get('/marcas/', 'BrandController@show')->name('brand-show');
Route::get('/marcas/nueva/', 'BrandController@new')->name('brand-new');
Route::post('/marcas/nueva/', 'BrandController@save')->name('brand-save');
Route::get('/marcas/{brand}/eliminar/', 'BrandController@delete')->name('brand-delete');
Route::get('/marcas/{brand}/editar/', 'BrandController@edit')->name('brand-edit');
Route::put('/marcas/{brand}/editar/', 'BrandController@update')->name('brand-update');
Route::get('/marcas/{brand}','BrandController@detail')->name('brand-detail');

Route::get('/marcasApi/', 'BrandController@datatableApi')->name('brand-api');

//PROVEEDORES
Route::get('/provedores/', 'SupplierController@show')->name('supplier-show');
Route::get('/provedores/nuevo/', 'SupplierController@new')->name('supplier-new');
Route::post('/provedores/nuevo/', 'SupplierController@save')->name('supplier-save');
Route::get('/provedores/{supplier}/editar/', 'SupplierController@edit')->name('supplier-edit');
Route::put('/provedores/{supplier}/editar/', 'SupplierController@update')->name('supplier-update');
Route::get('/provedores/{supplier}','SupplierController@detail')->name('supplier-detail');


//PRODUCTO
Route::get('/productos/', 'ProductController@show')->name('product-show');
Route::get('/productos/nuevo/', 'ProductController@new')->name('product-new');
Route::post('/productos/nuevo/', 'ProductController@save')->name('product-save');
Route::get('/productos/{product}/editar/', 'ProductController@edit')->name('product-edit');
Route::put('/productos/{product}/editar/', 'ProductController@update')->name('product-update');
Route::get('/productos/{product}','ProductController@detail')->name('product-detail');

Route::get('/productosApi/', 'ProductController@datatableApi')->name('product-api');

//CONTACTO
Route::get('/contactos/{model}/{id}/nuevo','ContactController@new')->name('contact-new');
Route::post('/contactos/{model}/{id}/nuevo','ContactController@save')->name('contact-save');
Route::get('/contactos/{model}/{id}/{contact}/editar','ContactController@edit')->name('contact-edit');
Route::put('/contactos/{model}/{id}/{contact}/editar','ContactController@update')->name('contact-update');
Route::get('/contactos/{model}/{id}/{contact}/eliminar','ContactController@delete')->name('contact-delete');

//LOCALIDADES
Route::post('/api/localidades/', 'LocationController@selectApi')->name('location-api');

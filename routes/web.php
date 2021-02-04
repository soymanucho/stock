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
Route::post('/deploy', 'deployController@deploy')->name('deploy');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ecommerce_customers', function () {
    return view('support.ecommerce_customers');
});
Route::get('/ecommerce_orders', function () {
    return view('support.ecommerce_orders_history');
});
Route::get('/invoice_template', function () {
    $receipt = App\Receipt::where('id',1)->get()->first();
    $sale = $receipt->sale;
    return view('support.invoice_template',compact('receipt','sale'));
});
Route::get('/invoice_archive', function () {
    return view('support.invoice_archive');
});


//DASHBOARD
Route::get('/home', 'DashboardController@historicSales')->name('home');
Route::get('/dashboard/mensual/ventas', 'DashboardController@monthlycSales')->name('dashboard-monthly-sales');
Route::get('/dashboard/dia/ventas', 'DashboardController@dailySales')->name('dashboard-daily-sales');

//AUTH
Auth::routes();
Auth::routes(['register' => false]);

//ORDENES
Route::get('/ordenes/', 'OrderController@show')->name('order-show');
Route::get('/ordenes/nueva/', 'OrderController@new')->name('order-new');
Route::post('/ordenes/nueva/', 'OrderController@save')->name('order-save');
Route::get('/ordenes/{order}/editar/', 'OrderController@edit')->name('order-edit');
Route::put('/ordenes/{order}/editar/', 'OrderController@update')->name('order-update');
Route::get('/ordenes/{order}/eliminar/', 'OrderController@delete')->name('order-delete');
Route::get('/ordenes/{order}','OrderController@detail')->name('order-detail');
Route::get('/ordenes/{order}/producto/{productOrder}/eliminar','OrderController@deleteProduct')->name('order-product-delete');
Route::post('/ordenes/{order}/producto/nuevo','OrderController@newProduct')->name('order-product-new');
Route::post('/ordenes/{order}/confirmar/','OrderController@receiveOrder')->name('order-receive');
Route::get('/ordenes/{order}/enviar/','OrderController@mailOrder')->name('order-mail');

//VENTAS
Route::get('/ventas/', 'SaleController@show')->name('sale-show');
Route::get('/ventas/nueva/', 'SaleController@new')->name('sale-new');
Route::post('/ventas/nueva/', 'SaleController@save')->name('sale-save');
Route::get('/ventas/{sale}/editar/', 'SaleController@edit')->name('sale-edit');
Route::put('/ventas/{sale}/editar/', 'SaleController@update')->name('sale-update');
Route::get('/ventas/{sale}/eliminar/', 'SaleController@delete')->name('sale-delete');
Route::get('/ventas/{sale}','SaleController@detail')->name('sale-detail');
Route::get('/ventas/{sale}/producto/{productSale}/eliminar','SaleController@deleteProduct')->name('sale-product-delete');
Route::post('/ventas/{sale}/producto/nuevo','SaleController@newProduct')->name('sale-product-new');

//REMITOS
Route::get('/ventas/{sale}/remitos/','ReceiptController@show')->name('receipt-show');
Route::get('/ventas/{sale}/remitos/nuevo/','ReceiptController@new')->name('receipt-new');
Route::get('/ventas/{sale}/remitos/{receipt}/eliminar/','ReceiptController@delete')->name('receipt-delete');
Route::get('/ventas/{sale}/remitos/{receipt}/descargar/','ReceiptController@download')->name('receipt-download');
Route::get('/ventas/{sale}/remitos/{receipt}/imprimir/','ReceiptController@print')->name('receipt-print');
Route::get('/ventas/{sale}/remitos/{receipt}/detalle/','ReceiptController@detail')->name('receipt-detail');

//FACTURAS
Route::get('/ventas/{sale}/facturas/','InvoiceController@show')->name('invoice-show');
Route::post('/ventas/{sale}/facturas/nuevo/','InvoiceController@new')->name('invoice-new');
Route::get('/ventas/{sale}/facturas/{invoice}/eliminar/','InvoiceController@delete')->name('invoice-delete');
Route::get('/ventas/{sale}/facturas/{invoice}/descargar/','InvoiceController@download')->name('invoice-download');
Route::get('/ventas/{sale}/facturas/{invoice}/imprimir/','InvoiceController@print')->name('invoice-print');
Route::get('/ventas/{sale}/facturas/{invoice}/detalle/','InvoiceController@detail')->name('invoice-detail');

//CLIENTE
Route::get('/clientes/', 'ClientController@show')->name('client-show');
Route::get('/clientes/nuevo/', 'ClientController@new')->name('client-new');
Route::post('/clientes/nuevo/', 'ClientController@save')->name('client-save');
Route::get('/clientes/{client}/editar/', 'ClientController@edit')->name('client-edit');
Route::put('/clientes/{client}/editar/', 'ClientController@update')->name('client-update');
Route::get('/clientes/{client}','ClientController@detail')->name('client-detail');

Route::get('/clientesApi/', 'ClientController@datatableApi')->name('client-api');
Route::post('/clientesSelectApi/', 'ClientController@selectApi')->name('client-select-api');

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

Route::post('/proveedoresSelectApi/', 'SupplierController@selectApi')->name('supplier-select-api');


//PRODUCTO
Route::get('/productos/', 'ProductController@show')->name('product-show');
Route::get('/productos/nuevo/', 'ProductController@new')->name('product-new');
Route::post('/productos/nuevo/', 'ProductController@save')->name('product-save');
Route::get('/productos/{product}/editar/', 'ProductController@edit')->name('product-edit');
Route::put('/productos/{product}/editar/', 'ProductController@update')->name('product-update');
Route::get('/productos/{product}','ProductController@detail')->name('product-detail');

Route::get('/productosApi/', 'ProductController@datatableApi')->name('product-api');
Route::post('/productosSelectApi/', 'ProductController@selectApi')->name('product-select-api');

//CONTACTO
Route::get('/contactos/{model}/{id}/nuevo','ContactController@new')->name('contact-new');
Route::post('/contactos/{model}/{id}/nuevo','ContactController@save')->name('contact-save');
Route::get('/contactos/{model}/{id}/{contact}/editar','ContactController@edit')->name('contact-edit');
Route::put('/contactos/{model}/{id}/{contact}/editar','ContactController@update')->name('contact-update');
Route::get('/contactos/{model}/{id}/{contact}/eliminar','ContactController@delete')->name('contact-delete');

//ESTADO DEL PRODUCTO DE UNA VENTA U ORDEN
Route::get('/ventas/{sale}/producto/{productSale}/estado/{productStatus}/edit','ProductStatusController@editSale')->name('sale-product-status-edit');
Route::get('/ordenes/{order}/producto/{productOrder}/estado/{productStatus}/edit','ProductStatusController@editOrder')->name('order-product-status-edit');

//LOCALIDADES
Route::post('/api/localidades/', 'LocationController@selectApi')->name('location-api');

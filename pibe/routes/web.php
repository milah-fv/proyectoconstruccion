<?php


// --------------------Paginas 
Route::get('/', 'MainPagesController@inicio');
Route::get('/terminos_y_condiciones','MainPagesController@terminos_y_condiciones');
Route::get('/productos','MainPagesController@productos')->name('productos');
// Producto detalle Normal
Route::get('/producto/{producto}','MainPagesController@productoDetalle');
// Producto detalle Ajax
Route::get('/mostrarproducto/{producto}','MainPagesController@ajaxProductoDetalle');
// --------------------Carrito
Route::resource('/carrito','CartController');
Route::put('/editarCarrito','CartController@updateCarrito');
// -------------------Cliente
Route::auth();
Route::get('/cliente/verificacion/{token}', 'Auth\RegisterController@customerVerify');
Route::get('/confirmacion/nueva','Auth\ResendEmailController@resend');
Route::post('/confirmacion/nueva','Auth\ResendEmailController@resendEmail');
Route::get('/cuenta/completarPerfil','Shop\CustomerController@completarPerfil');


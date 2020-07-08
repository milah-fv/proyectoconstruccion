<?php


// --------------------Paginas 
Route::get('/', 'MainPagesController@inicio');
Route::get('/nosotros','MainPagesController@nosotros');
Route::get('/contacto','MainPagesController@contacto');
Route::post('/contacto','MainPagesController@enviarContacto');
Route::get('/terminos_y_condiciones','MainPagesController@terminos_y_condiciones');
Route::get('/productos','MainPagesController@productos')->name('productos');
// Producto detalle Normal
Route::get('/producto/{producto}','MainPagesController@productoDetalle');
// Producto detalle Ajax
Route::get('/mostrarproducto/{producto}','MainPagesController@ajaxProductoDetalle');
//---------------------Busqueda de Productos
Route::get('/productos/{slug}','MainPagesController@buscarCategoria');
Route::get('/productos/color/{id}','MainPagesController@buscarColor');
Route::get('/productos/talla/{name}','MainPagesController@buscarTalla');
// --------------------Carrito
Route::resource('/carrito','CartController');
Route::put('/editarCarrito','CartController@updateCarrito');
//---------------------Cupones
Route::post('/cupon', 'Shop\CouponController@store')->name('customer.coupon.store');
Route::delete('/cupon', 'Shop\CouponController@destroy')->name('customer.coupon.destroy');
//---------------------Blog 
Route::get('/blog', 'BlogController@blog')->name('blog');
Route::get('/blog/{slug}', 'BlogController@post')->name('post');
Route::get('/blogCategory/{slug}', 'BlogController@category')->name('category');
Route::get('/tag/{slug}', 'BlogController@tag')->name('tag');

// -------------------Cliente
Route::auth();
Route::get('/cliente/verificacion/{token}', 'Auth\RegisterController@customerVerify');
Route::get('/confirmacion/nueva','Auth\ResendEmailController@resend');
Route::post('/confirmacion/nueva','Auth\ResendEmailController@resendEmail');
Route::get('/cuenta/completarPerfil','Shop\CustomerController@completarPerfil');
Route::put('/cuenta/completarPerfil','Shop\CustomerController@completarPerfilPago');

Route::group(['middleware'=>['auth:web','actived']], function() 
{

	Route::prefix('profile')->group(function () 
	{
		Route::get('/','Shop\CustomerController@home');
		Route::get('/orders','Shop\OrderController@index');
		Route::get('/orders/{order}','Shop\OrderController@show'); 
		Route::put('/orders/canceled/{order}','Shop\OrderController@canceled'); 

		Route::get('/wish_list','Shop\CustomerController@wish_list'); 

		Route::get('/changePass/{id}','Shop\CustomerController@changePassForm');
		Route::put('/changePass','Shop\CustomerController@changePass');
		
		Route::get('/data','Shop\CustomerController@profile');  
		Route::get('/purchases','Shop\CustomerController@purchases');

		Route::resource('/boucher','BoucherController'); 
		Route::get('/boucher/{boucher}','BoucherController@show'); 
		Route::put('/boucher/canceled/{boucher}','BoucherController@canceled');           
	});

	Route::group(['middleware'=>'cart'], function() 
	{
		Route::get('checkout','Shop\PaymentController@checkout');
		Route::post('checkout','Shop\PaymentController@sucess');
	});

	Route::put('customer/edit_profile','Shop\CustomerController@edit_profile');
	Route::post('messageCustomer','Dashboard\MessageController@customer');
});


Route::prefix('admin')->group(function () 
{
	Route::get('/','Dashboard\DashboardController@index')->name('admin.dashboard'); 
    Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\UserLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\UserLoginController@logout')->name('admin.logout');

    // Admin restablecer password 
    Route::post('/password/email','Auth\UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('/password/reset','Auth\UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('/password/reset','Auth\UserResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\UserResetPasswordController@showResetForm')->name('user.password.reset');

    Route::group(['middleware' => 'auth:user'], function ()
    {
    	
    	// Sliders
    	Route::resource('/slider','Dashboard\SliderController');
		Route::get('/sliderJson','Dashboard\SliderController@indexJson');
		//	Ventas
		Route::resource('/orders','Dashboard\OrderController');
		Route::get('/orderJson','Dashboard\OrderController@indexJson');
		// Route::resource('/orders','Dashboard\OrderController')->middleware('permission:orders.index');
		// Route::get('/orderJson','Dashboard\OrderController@indexJson');
		// Comprobantes
    	Route::get('orders/pdf/{id}', 'Shop\OrderController@pdfInvoice')->name('order_pdf');
		// Reports
			Route::get('/reports','Dashboard\ReportController@index');
			Route::post('/reports/topProduct','Dashboard\ReportController@topProducts');

			Route::get('/reports/topCustomer','Dashboard\ReportController@topCustomerForm');
			Route::post('/reports/topCustomer','Dashboard\ReportController@topCustomer');

			Route::get('/reports/purchases','Dashboard\ReportController@purchasesForm');
			Route::post('/reports/purchases','Dashboard\ReportController@purchases');

			Route::get('/reports/stockProductForm','Dashboard\ReportController@stockProductForm');
			Route::get('/reports/stockProduct','Dashboard\ReportController@stockProduct');
		
		// Productos
		Route::resource('/product','Dashboard\ProductController');
		Route::get('/productJson','Dashboard\ProductController@indexJson');
		// Categorias
		Route::resource('/category','Dashboard\CategoryController');
		// Imagen
		Route::resource('/image','Dashboard\ImageController');
		// Cupones
    	Route::resource('/coupon','Dashboard\CouponController');
		Route::get('/couponJson','Dashboard\CouponController@indexJson');
		// Opciones de Pago
    	Route::resource('/paymentOptions','Dashboard\PaymentTypeController');
		// Color
		Route::resource('/color','Dashboard\ColorController');
		// Tallas
		Route::resource('/size','Dashboard\SizeController');
		// Customer
		Route::resource('/customer','Dashboard\CustomerController');
		Route::get('/customerJson','Dashboard\CustomerController@indexJson');
		// Route::resource('/customer','Dashboard\CustomerController')->middleware('permission:customers.index');
		// Route::get('/customerJson','Dashboard\CustomerController@indexJson');
		// Blog
		Route::resource('/posts', 'Dashboard\PostController');
		Route::get('/postsJson','Dashboard\PostController@indexJson');
		Route::resource('/tags', 'Dashboard\TagController');
		Route::resource('/blogCategory', 'Dashboard\BlogCategoryController');
		
		// Empleados
		// Route::resource('/user','Dashboard\UserController')->middleware('permission:users.index');
		Route::resource('/user','Dashboard\UserController');

		// Boucher
		Route::resource('/boucher','Dashboard\BoucherController');
		Route::get('/boucherJson','Dashboard\BoucherController@indexJson');

		Route::get('/profile/{admin}','Dashboard\UserController@editProfile');
		Route::put('/profile/updated/{admin}','Dashboard\UserController@updateProfile');
		Route::put('/changePassword','Dashboard\UserController@changePassword');
			
		
		Route::resource('/role','RoleController')->middleware('permission:users.index');

		
		Route::resource('/message','Dashboard\MessageController');
			

  	});

});


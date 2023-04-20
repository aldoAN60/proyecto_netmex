<?php
use App\Http\Controllers\contactoController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\moviesController;
use App\Http\Controllers\paypalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteleraController;

Route::view('/','inicio')->name('inicio'); /*inicio de pagina*/ 
Route::view('mandatory-sign-up','mandatory-sign-up')->name('mandatory-sign-up'); /*muestra una pagina de error cuando no se esta autorizado*/

Route::get('/donacion-exitosa', [moviesController::class,'index'])->name('movies.index');
Route::view('/paypal-donation','paypal-donation')->name('paypal-donation');
Route::post('/paypal/pay', [paypalController::class,'payment_paypal'])->name('payment');
Route::get('/paypal/status', [paypalController::class,'paypal_status'])->name('status');

Route::get('/movies/{movie}', 'moviesController@show')->name('movies.show');

Route::view('/contacto', 'contacto')->name('contacto');
Route::get('/contacto',[contactoController::class,'index'])->name('contacto');
Route::post('/contacto', [contactoController::class,'store'])->name('contacto-post');


Route::post('/registro_email',[homepageController::class,'sign_up_email'])->name('registro_inicio');;

// Route::view('/')->name();
Route::get('/peliculas/{id}',[CarteleraController::class,'mostrar_trillers'])->name('peliculas.triller');


Route::get('/catalogo', function (){
    return view('catalogo');
});


Route::get('/catalogo/{id}', [CarteleraController::class, 'show'])->name('catalogo.show');
Route::get('/catalogo', [CarteleraController::class, 'index'])->name('catalogo.index');
#Route::get('/paypal-success', [paypalController::class,'index'])->name('paypal-success');
use  App\Http\Controllers\AvatarController;



Route::view('/sign_up','sign_up')->name('sign_up');
Route::view('/mi_cuenta', 'mi_cuenta')->name('mi_cuenta');
// Route::view('/register','register')->name('register');
// Route::view('/layout','layout')->name('layout');
Route::get('/mi_cuenta', 'AvatarController@index')->name('mi_cuenta');



Route::resource('avatar', 'AvatarController');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// // Route::get('/avatar', [App\Http\Controllers\AvatarController::class, 'store']);

Route::get('/fondo', function (){
    return view('fondo');
});
Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/mision', 'mision')->name('mision');
Route::view('/vision', 'vision')->name('vision');
Route::view('/valores', 'valores')->name('valores');
Route::view('/tyc', 'tyc')->name('tyc');

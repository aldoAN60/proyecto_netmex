<?php
use App\Http\Controllers\contactoController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\moviesController;
use App\Http\Controllers\paypalController;
use Illuminate\Support\Facades\Route;

Route::get('/donacion-exitosa', [moviesController::class,'index'])->name('movies.index');
Route::get('/movies/{movie}', 'moviesController@show')->name('movies.show');

Route::view('/','inicio')->name('inicio');
Route::view('/sign_up','sign_up')->name('sign_up');

Route::post('/registro_email',[homepageController::class,'sign_up_email'])->name('registro_inicio');;

Route::view('/paypal-donation','paypal-donation')->name('paypal-donation');
Route::view('/contacto', 'contacto')->name('contacto');

Route::get('/contacto',[contactoController::class,'index'])->name('contacto');

Route::post('/contacto', [contactoController::class,'store'])->name('contacto-post');

Route::post('/paypal/pay', [paypalController::class,'payment_paypal'])->name('payment');

Route::get('/paypal/status', [paypalController::class,'paypal_status'])->name('status');
#Route::get('/paypal-success', [paypalController::class,'index'])->name('paypal-success');
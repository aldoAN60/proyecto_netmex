<?php
use App\Http\Controllers\contactoController;
use Illuminate\Support\Facades\Route;


Route::view('/','inicio')->name('inicio');
Route::view('/sign_up','sign_up')->name('sign_up');

Route::view('/paypal-donation','paypal-donation')->name('paypal-donation');
Route::view('/contacto', 'contacto')->name('contacto');

Route::get('/contacto',[contactoController::class,'index'])->name('contacto');
Route::post('/contacto', [contactoController::class,'store']);

<?php

use Illuminate\Support\Facades\Route;


Route::view('/','inicio')->name('inicio');
Route::view('/sign_up','sign_up')->name('sign_up');
route::view('/paypal-donation','paypal-donation')->name('paypal-donation');

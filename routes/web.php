<?php

use Illuminate\Support\Facades\Route;

Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/sign_up', function (){
    return view('sign_up');
});
route::get('paypal-donation', function(){
    return view('paypal-donation');
});

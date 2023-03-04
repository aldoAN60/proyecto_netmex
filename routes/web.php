<?php

use Illuminate\Support\Facades\Route;

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/sign_up', function (){
    return view('sign_up');
});

Route::get('/catalogo', function (){
    return view('catalogo');
});
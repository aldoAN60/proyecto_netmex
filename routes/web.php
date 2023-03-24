<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteleraController;

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/sign_up', function (){
    return view('sign_up');
});

Route::get('/catalogo', function (){
    return view('catalogo');
});

Route::get('/catalogo', [CarteleraController::class, 'index'])->name('cartelera');
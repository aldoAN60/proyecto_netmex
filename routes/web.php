<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AvatarController;

$porte = [
            ['title' => 'Excelencia: Nos esforzamos por ofrecer siempre lo mejor.'],
       ['title' => 'Innovación: Buscamos constantemente formas de mejorar y hacer las cosas de manera diferente.'],
        ['title' => 'Integridad: Nos regimos por altos estándares éticos y de transparencia en todas nuestras operaciones.'],
        ['title' => 'Servicio al cliente: Tratamos a nuestros clientes con respeto y dedicación, brindando una experiencia excepcional en todo momento.'],
        
       ];
Route::view('/', 'inicio')->name('inicio');
Route::view('/sign_up','sign_up')->name('sign_up');
Route::view('/log_in', 'log_in')->name('log_in');
Route::view('/contacto', 'contacto', compact('porte'))->name('contacto');
Route::view('/mi_cuenta', 'mi_cuenta')->name('mi_cuenta');
Route::view('/contenido', 'contenido')->name('contenido');
Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/login','login')->name('login');
Route::view('/register','register')->name('register');
Route::view('/layout','layout')->name('layout');

Route::get('/mi_cuenta', 'AvatarController@index')->name('mi_cuenta');



Route::resource('avatar', 'AvatarController');
// Route::resource('avatar', [AvatarController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/avatar', [App\Http\Controllers\AvatarController::class, 'store']);
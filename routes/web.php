<?php
use App\Http\Controllers\contactoController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\moviesController;
use App\Http\Controllers\paypalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarteleraController;

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

Route::get('/catalogo', function (){
    return view('catalogo');
});

Route::get('/catalogo', [CarteleraController::class, 'index'])->name('cartelera');
Route::get('/paypal/status', [paypalController::class,'paypal_status'])->name('status');
#Route::get('/paypal-success', [paypalController::class,'index'])->name('paypal-success');
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

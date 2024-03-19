<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [PagesController::class, 'inicio'])->name('inicio');

Route::get('detalle/{id}', [PagesController::class, 'detalle'])->name('cliente.detalle');  #laravel entiende que se refiere al id del cliente porque en welcome.blade.php le pase $cliente

Route::post('cliente.crear', [PagesController::class,'crear'])->name('cliente.crear');

Route::get('/editar/{id}', [PagesController::class,'editar'])->name('cliente.editar');

Route::put('/editar/{id}', [PagesController::class,'update'])->name('cliente.update');

Route::delete('/eliminar/{id}', [PagesController::class,'eliminar'])->name('cliente.eliminar');

route::get('nosotros/{nombre?}',[PagesController::class, 'nosotros'])->name('nosotros');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

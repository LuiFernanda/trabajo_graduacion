<?php

use App\Http\Controllers\personaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuario', function () {
    return 'Aqui podemos registrar usuarios';
})->name('usuario');

Route::get('/persona/{nombre}', [personaController::class, 'show'])->name('persona');

Route::post('/persona', function () {
    return 'Aqui podemos registrar una persona';
})->name('persona');

Route::get('/consulta', function () {
    return 'Aqui podemos consultar una persona';
});
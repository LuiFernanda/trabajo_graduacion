<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\personaController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

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

Route::apiResource('persona', personaController::class);
Route::apiResource('estado', EstadoController::class);

Route::get('/busqueda/{persona}', [personaController::class, 'search'])->name('searchpersona');

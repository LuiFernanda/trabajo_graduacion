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
Route::get('/registro', [App\Http\Controllers\HomeController::class, 'persona'])->name('registro');
Route::get('/estados', [App\Http\Controllers\HomeController::class, 'estado'])->name('estados');
Route::get('/usuarios', [App\Http\Controllers\HomeController::class, 'usuario'])->name('usuarios');
Route::get('/informacion', [App\Http\Controllers\HomeController::class, 'info'])->name('informacion');

Route::apiResource('persona', personaController::class);
Route::apiResource('estado', EstadoController::class);

Route::get('/busqueda/{persona}', [personaController::class, 'search'])->name('searchpersona');
Route::get('/busquedaCui/{persona}', [personaController::class, 'searchCui'])->name('searchCui');
Route::get('/estatus/', [EstadoController::class, 'status'])->name('status');
Route::get('/datopersona/{persona}', [personaController::class, 'estado'])->name('estadopersona');

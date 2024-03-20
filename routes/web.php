<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('simula');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'simulador']);

Route::post('/simulador/simular', [App\Http\Controllers\HomeController::class, 'simular'])->name('simulador.simular');

Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'inicio'])->name('jogadas.inicio');

Route::post('/selecao/empresa', [App\Http\Controllers\HomeController::class, 'selecao_empresa'])->name('selecao.empresa');

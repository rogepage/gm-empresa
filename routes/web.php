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

Route::get('/simulador', [App\Http\Controllers\HomeController::class, 'simulador'])->name('simulador');

Route::post('/simulador/simular', [App\Http\Controllers\HomeController::class, 'simular'])->name('simulador.simular');

Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'inicio'])->name('jogadas.inicio');

Route::post('/selecao/empresa', [App\Http\Controllers\HomeController::class, 'selecao_empresa'])->name('selecao.empresa');

Route::get('/jogadas', [App\Http\Controllers\HomeController::class, 'jogadas'])->name('jogadas');
Route::get('/jogadas/reiniciar', [App\Http\Controllers\HomeController::class, 'reiniciar'])->name('jogadas.reiniciar');



Route::post('/jogada/gravar', [App\Http\Controllers\HomeController::class, 'jogada_gravar'])->name('jogada.gravar');
Route::get('/resultado', [App\Http\Controllers\HomeController::class, 'resultado'])->name('resultado');


Route::get('/parametros', [App\Http\Controllers\HomeController::class, 'parametros']);
Route::post('/parametros/update', [App\Http\Controllers\HomeController::class, 'update'])->name('parametros.update');

Route::get('/parametros/reset', [App\Http\Controllers\HomeController::class, 'reset'])->name('parametros.reset');

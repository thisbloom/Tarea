<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CompraController;

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

Route::view('/','welcome');

Route::view("/crearcursos", "crearcurso")->name('cursocreate');
Route::post("/crearcursos2", [CursoController::class,"crear"]);

Route::get("/BuscarCursos",[CursoController::class,"mostrar"]);

Route::get("/CursosCreados",[CursoController::class,"creados"]);

Route::get("/ActualizarCurso/{id}",[CursoController::class,"vpactualizar"]);
Route::post("/ActualizarCurso",[CursoController::class,"actualizar"]);

Route::get("/DetallesCurso/{id}",[CursoController::class,"detalles"],["id","id"]);


Route::get("/comprarcurso/{id}", [CompraController::class,"comprar"],["id","id"]);

Route::get("/CursosComprados",[CompraController::class,"mostrar"]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


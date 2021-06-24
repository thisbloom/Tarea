<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\TemaController;

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

Route::get("/BuscarCursos",[CursoController::class,"mostrar"])->name('mostrarxcurso');

Route::get("/CursosCreados",[CursoController::class,"creados"])->name('mostrarxcreado');

Route::get("/ActualizarCurso/{id}",[CursoController::class,"vpactualizar"]);
Route::post("/ActualizarCurso",[CursoController::class,"actualizar"]);

Route::get("/DetallesCurso/{id}",[CursoController::class,"detalles"],["id","id"]);



Route::get("/comprarcurso/{id}", [CompraController::class,"comprar"],["id","id"]);

Route::get("/CursosComprados",[CompraController::class,"mostrar"])->name('mostrarxcomprado');

Route::get("/DetallesCompras/{id}",[CompraController::class,"detalles"],["id","id"]);



//Route::view("/creartema/{id}", [TemaController::class,"creartema"]);
Route::get("/creartema/{idx}", function(string $idx){
    return view("creartema")->with("idx",$idx);
});
Route::post("/creartema2",[TemaController::class,"creartema"]);

Route::get("/mostrartemas/{id}",[TemaController::class,"mostrartemas"]);

Route::get("/editartema/{id}",[TemaController::class,"vpeditar"]);
Route::post("/editartema",[TemaController::class,"editar"]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


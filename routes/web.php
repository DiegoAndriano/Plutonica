<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\MegustaController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('articulos')->group(function(){
    Route::get('/', [ArticuloController::class, 'index'])->name('articulos.index');
    Route::post('/', [ArticuloController::class, 'store'])->name('articulos.store');
    Route::get('/create', [ArticuloController::class, 'create'])->name('articulos.create');
    Route::get('/edit/{articulo}', [ArticuloController::class, 'edit'])->name('articulos.edit');
    Route::get('/{articulo}', [ArticuloController::class, 'show']);

    Route::patch('/{articulo}', [ArticuloController::class, 'update'])->name('articulos.update');
    Route::delete('/{articulo}', [ArticuloController::class, 'destroy'])->name('articulos.detroy');

    Route::post('/{articulo}/like',[MegustaController::class, 'store'])->name('megusta.store');
});

Route::prefix('comentarios')->group(function(){
    Route::post('/{comentario}', [ComentarioController::class, 'store'])->name('comentarios.store');
    Route::delete('/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
});

Auth::routes();

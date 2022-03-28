<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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
Route::get('/index', [ProdutoController::class, 'index']);
Route::get('/sabores/create', [ProdutoController::class, 'create'])->name('sabores.create');
Route::post('/store', [ProdutoController::class, 'store'])->name('index.store');
Route::get('/sabores/listar', [ProdutoController::class, 'tabela'])->name('sabores.listar');
Route::get('/sabores/editar', [ProdutoController::class, 'edit'])->name('sabores.editar');
Route::get('/eliminar{id}', [ProdutoController::class, 'eliminar'])->name('sabores.eliminar');
Route::get('/sabores/editar{id}', [ProdutoController::class, 'edit'])->name('sabores.editar');
Route::put('/update{id}', [ProdutoController::class, 'update'])->name('sabores.atualizar');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

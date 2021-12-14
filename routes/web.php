<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::view('/', 'welcome')->name('inicio');
Route::view('/board', 'board')->name('board');

// Classe de Projeto
Route::view('/projetos/criar', 'projetosCriar')->name('projetos.create');
Route::get('/projetos', [ProjectController::class, 'index'])->name('projetos.index');
Route::post('/projetos', [ProjectController::class, 'store'])->name('projetos.store');
Route::get('/projetos/{id}', [projectController::class, 'show'])->name('projetos.show');
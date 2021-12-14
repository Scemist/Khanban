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
Route::prefix('projetos')->group(function () {
	Route::view('/criar', 'projetos.projetos-form')->name('projetos.create');
	Route::get('/', [ProjectController::class, 'index'])->name('projetos.index');
	Route::get('/{id}', [projectController::class, 'show'])->whereNumber('id')->name('projetos.show');
	Route::post('/', [ProjectController::class, 'store'])->name('projetos.store');
	Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('projetos.destroy');
	Route::put('/{id}', [ProjectController::class, 'update'])->name('projetos.update');
});
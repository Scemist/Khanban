<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/board', function () {
	return view('board');
});

Route::get('/projetos', [Controllers\ProjectController::class, 'index'])->name('projetos.index');

Route::get('/projetos/criar', function () {
	return view('projetosCriar');
})->name('projetos.criarForm');

Route::post('/projetos', [Controllers\ProjectController::class, 'store'])->name('projetos.store');

Route::get('/projetos/{id}', [Controllers\projectController::class, 'show'])->name('projetos.show');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkeletonController;
use App\Http\Controllers\UserController;

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

// Classe de Autenticação
Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Classe de Projeto
Route::group(['middleware' => 'auth'], function() {
	Route::view('/', 'index')->name('inicio');

	Route::view('/usuario/novo', 'join')->name('join');
	Route::post('/usuario/novo', [UserController::class, 'store'])->name('user.join');
	
	Route::get('/projetos', [ProjectController::class, 'index'])->name('projetos.lista');

	Route::get('/board/{id}', [ProjectController::class, 'project/board'])->name('projetos.board');

	Route::view('/projeto/novo', 'projetos/projetos-form')->name('projetos.criar');
	Route::post('/projeto/novo', [ProjectController::class, 'store'])->name('projetos.store');
});

Route::prefix('skeleton')->group(function () {
	Route::get("/css", function() { return Redirect::to("css/home.min.css"); })->name('skeleton.css');
	Route::get("/js", function() { return Redirect::to("js/home.min.js"); })->name('skeleton.js');
});

Route::get('/{any}', function ($search) {
    return redirect()->route('inicio');
})->where('any', '.*');

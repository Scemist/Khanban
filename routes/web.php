<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkeletonController;

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

// Classe de Autenticação
Route::view('/login', 'login')->name('login');
Route::view('/cadastro', 'join')->name('join');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Classe de Projeto
Route::group(['middleware' => 'auth'], function() {
	Route::prefix('projetos')->group(function () {
		Route::view('/', 'templates/index')->name('projetos.index');
		Route::get('/lista/pulse', [ProjectController::class, 'index'])->name('projetos.lista');
		Route::view('/criar/pulse', 'projetos/projetos-form')->name('projetos.criar');
		Route::view('/board/{rota}', [ProjectController::class, 'board'])->name('projetos.board');
		Route::get('/{id}', [projectController::class, 'show'])->whereNumber('id')->name('projetos.show');
		Route::post('/', [ProjectController::class, 'store'])->name('projetos.store');
		Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('projetos.destroy');
		Route::put('/{id}', [ProjectController::class, 'update'])->name('projetos.update');
	});
});

Route::prefix('skeleton')->group(function () {
	Route::get("/css", function() { return Redirect::to("css/home.min.css"); })->name('skeleton.css');
	Route::get("/js", function() { return Redirect::to("js/home.min.js"); })->name('skeleton.js');
});

Route::get('/projetos/{any}', function ($search) {
    return redirect()->route('projetos.index');
})->where('any', '.*');

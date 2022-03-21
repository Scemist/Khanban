<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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


Route::view('/login', 'login')->name('login');

Route::controller(AuthController::class)->group(function () {
	Route::post('/login', 'login')->name('auth.login');
	Route::get('/logout', 'logout')->name('auth.logout');
});

Route::group(['middleware' => 'auth'], function() {

	Route::view('/usuarios/criar', 'join')->name('users.create');
	Route::controller(UserController::class)->group(function () {
		Route::get('/', 'index')->name('users.home');
		Route::post('/usuarios', 'store')->name('users.store');
		Route::delete('/usuarios/{id}', 'destroy')->name('users.destroy');
	});
	
	Route::view('/projetos/criar', 'project-form')->name('projects.create');
	Route::controller(ProjectController::class)->group(function () {
		Route::get('/projetos', 'index')->name('projects.index');
		Route::post('/projetos', 'store')->name('projects.store');
		Route::delete('/projetos/{id}', 'destroy')->name('projects.destroy');
		Route::get('/board/{id}', 'board')->name('projects.board');
		Route::post('/board/{id}/reorder', 'saveTasksOrder');
	});

	Route::view('/tarefas/criar', 'project-form')->name('tasks.create'); // Form view
	Route::controller(TaskController::class)->group(function () {
		Route::get('/tarefas', 'index')->name('tasks.index'); // Show all
		Route::post('/tarefas', 'store')->name('tasks.store'); // Save on database
		Route::get('/tarefas/{id}', 'show')->name('tasks.show'); // Show on
		Route::get('/tarefas/{id}/editar', 'edit')->name('tasks.edit'); // Edit view
		Route::patch('/tarefas/{id}', 'update')->name('tasks.update'); // Update on database
		Route::delete('/tarefas/{id}', 'destroy')->name('tasks.destroy'); // Delete
	});
});

Route::get('/{any}', function () {
    return redirect()->route('users.home');
})->where('any', '.*');

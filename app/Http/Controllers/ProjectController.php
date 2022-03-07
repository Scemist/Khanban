<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Column;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| AuthController
|--------------------------------------------------------------------------
|
| Responsável pela manipulação de projetos, os métodos são:
| Index, Store, Show, Update, Destroy e Board 
|
*/

class ProjectController extends Controller
{
    public function index() 
	{
		$projetos = Project::get();

		return view('projects', ['projetos' => $projetos]);
	}

	public function store(Request $request)
	{
		$projeto = new Project;
		$projeto->title = $request->titulo;
		$projeto->description = $request->descricao;
		$projeto->owner_id = Auth::id();
		$projeto->save();

		return redirect()->route('users.home');
	}

	public function show($id)
	{
		$projeto = Project::find($id);

		return view('projetos.projeto', ['projeto' => $projeto]);
	}

	public function update($id, Request $request)
	{
		$projeto = Project::find($id);
		$projeto->title = $request->titulo;
		$projeto->description = $request->descricao;
		$projeto->save();

		return redirect()->route('projects.show', $id);
	}

	public function destroy($id)
	{
		Project::destroy($id);

		return redirect()->route('projects.index');
	}

	public function board($id)
	{
		$users = User::get();
		$project = Project::find(1);

		$project = $project::with('columns.tasks.tags')->first();

		// dd($project);
		
		// foreach ($project->columns as $column) {
		// 	foreach ($column->tasks as $task) {
		// 		if (!empty($task->tags))
		// 			dump($task->tags->title);
		// 		echo $task->title . '<br>';
		// 	}
		// }

		// dd($project->columns[1]->tasks[1]->tags->title);

		return view('project.board', [
			'project' => $project, 
			'users' => $users,
			'columns' => $project->columns,
		]);
	}
}

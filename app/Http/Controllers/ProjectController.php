<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;

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

		$project = Project::with([
			'columns.tasks.tag',
			'columns.tasks.category',
		])->find($id);

		$categories = Project::find($id)->categories;

		return view('project.board', [
			'project' => $project,
			'columns' => $project->columns,
			'users' => $users,
			'categories' => $categories,
		]);
	}

	public function saveTasksOrder(Request $request)
	{
		DB::beginTransaction();
		try {
			$dados = json_decode($request->json, true);

			foreach ($dados as $id_tarefa => $tarefa) {
				$task = Task::find($id_tarefa);
				$task->column_id = $tarefa['coluna'];
				$task->position = $tarefa['posicao'];
				$task->save();
			}
		} catch (Throwable $erro) {
			DB::rollBack();
			echo "Erro ao salvar ordem das tarefas: {$erro}";
			die;
		}
		DB::commit();

		echo 'Ordem atualizada com sucesso!';
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Tag;
use Illuminate\Support\Facades\Redirect;
use Auth;

class TaskController extends Controller
{
	public function index()
	{
	}

	public function create()
	{
	}

	public function store(Request $request)
	{
		$task = new Task;
		$task->owner_id = Auth::id();
		$task->title = $request->titulo;
		$task->description = $request->descricao;
		$task->reference = $request->referencia;
		$task->color = $request->cor;
		$task->designated_id = $request->designado;
		$task->column_id = $request->coluna;
		// $task->category_id = $request->categoria;
		$task->save();
		$taskId = $task->id;

		if (isset($request->tag)) {
			$tag = new Tag();
			$tag->title = $request->etiqueta;
			$tag->task_id = $taskId;
			$tag->save();
		}

		return Redirect::route('projects.board', $request->projetoId);
	}

	public function show($id)
	{
		$tarefa = Task::find($id);

		echo json_encode($tarefa);
	}

	public function edit($id)
	{
	}

	public function update(Request $request, $id)
	{
	}

	public function destroy($id)
	{
	}
}

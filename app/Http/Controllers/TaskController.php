<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Task;
use App\Models\Tag;
use Auth;

class TaskController extends Controller
{
	public function store(Request $request)
	{
		DB::beginTransaction();
		try {
			$task = new Task;
			$task->owner_id = Auth::id();
			$task->title = $request->titulo;
			$task->description = $request->descricao;
			$task->reference = $request->referencia;
			$task->color = $request->cor;
			$task->designated_id = $request->designado;
			$task->column_id = $request->coluna;
			$task->category_id = $request->categoria;
			$task->save();
			$taskId = $task->id;

			if (isset($request->etiqueta)) {
				$tag = new Tag();
				$tag->title = $request->etiqueta;
				$tag->task_id = $taskId;
				$tag->save();
			}
		} catch (PDOException $erro) {
			DB::rollBack();
			return 'Erro no PDO';
		}
		DB::commit();

		return Redirect::route('projects.board', $request->projetoId);
	}

	public function show($id)
	{
		$tarefa = Task::with(['tag', 'category', 'subtasks', 'comments', 'owner', 'designated'])->find($id);

		echo json_encode($tarefa);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

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
		$projeto->titulo = $request->titulo;
		$projeto->descricao = $request->descricao;
		$projeto->criador = Auth::id();
		$projeto->save();

		return redirect()->route('inicio');
	}

	public function show($id)
	{
		$projeto = Project::find($id);

		return view('projetos.projeto', ['projeto' => $projeto]);
	}

	public function update($id, Request $request)
	{
		$projeto = Project::find($id);
		$projeto->titulo = $request->titulo;
		$projeto->descricao = $request->descricao;
		$projeto->save();

		return redirect()->route('projetos.show', $id);
	}

	public function destroy($id)
	{
		Project::destroy($id);

		return redirect()->route('projetos.index');
	}

	public function board()
	{
		return view('project.board');
	}
}

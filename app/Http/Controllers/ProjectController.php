<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() 
	{
		$projetos = Project::get();

		return view('projetos.projetos', ['projetos' => $projetos]);
	}

	public function store(Request $request)
	{
		$projeto = new Project;
		$projeto->titulo = $request->titulo;
		$projeto->descricao = $request->descricao;
		$projeto->save();

		return redirect()->route('projetos.index');
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
}

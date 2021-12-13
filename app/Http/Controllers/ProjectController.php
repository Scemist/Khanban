<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;

class ProjectController extends Controller
{
    function index() 
	{
		$projetos = Project::get();

		return view('projetos', ['projetos' => $projetos]);
	}

	public function store(Request $request)
	{
		$projeto = new Project;
		$projeto->titulo = $request->titulo;
		$projeto->descricao = $request->descricao;
		$projeto->save();

		return redirect()->route('projeto.index');
	}
}

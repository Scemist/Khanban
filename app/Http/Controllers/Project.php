<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models;

class Project extends Controller
{
    function index() {
		$titulo = "Correios";
		$descricao = "Sobre os correios";

		DB::table('projects')->insert([
			'titulo' => $titulo,
			'descricao' => $descricao
		]);

		$nome = [
			'nome' => 'Scemist'
		];
		return view('projetos', $nome);
	}
}

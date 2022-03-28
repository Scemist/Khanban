<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function index()
	{
		$projetos = Project::orderBy('title')->get();

		return view('index', ['projetos' => $projetos]);
	}

	public function store(Request $request): void
	{
		$user = new User;
		$user->name = $request->nome;
		$user->email = $request->email;
		$user->password = Hash::make($request->senha);
		$user->save();

		dd($user);
	}
}

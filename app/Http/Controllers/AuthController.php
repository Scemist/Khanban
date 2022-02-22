<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

/*
|--------------------------------------------------------------------------
| AuthController
|--------------------------------------------------------------------------
|
| Responsável pela autenticação do usuario, os métodos são:
| Login, Logout e Join
|
*/

class AuthController extends Controller
{
    public function login(Request $request)
	{
		$credenciais = [
			'email' => $request->email,
			'password' => $request->senha,
		];

		if(Auth::attempt($credenciais)) {
			$request->session()->regenerate();
			
			return redirect()->route('users.home');
		}

		return redirect()->route('login');
	}

	public function logout()
	{
		Auth::logout();

		return redirect()->route('users.home');
	}

	public function join(Request $request)
	{
		$credencias = [
			'nome' => $request->nome,
			'celuar' => $request->celular,
			'email' => $request->email,
			'password' => $request->senha
		];

		return redirect()->route('inicio');
	}
}

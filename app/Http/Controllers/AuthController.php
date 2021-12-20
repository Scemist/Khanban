<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
			
			return redirect()->route('projetos.board');
		}

		return redirect()->route('login');
	}

	public function logout()
	{
		Auth::logout();

		return redirect()->route('inicio');
	}
}

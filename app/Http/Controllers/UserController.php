<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
	public function index()
	{
		$projetos = Project::get();
		
		{
			$count = 1;
			Redis::set("log_{$count}", 'Scemist', 'EX', 10);
			Redis::set('idade', 2);
			Redis::del('idade');
			// dd(Redis::get('log_1'));

			// Redis::hSet('log:onix', 'one', 'online');
			// dd(Redis::hGet('log:onix', 'one'));

			// 'logs:{tecnologia}:{datetime}' = 'online'

			// Redis::hmSet(
			// 	"logs:sascar",
			// 	[
			// 	  'one' => 'online',
			// 	  'two' => 'offline',
			// 	],
			// );

			
			// dd(Redis::hGet('log:sascar', 'two'));
			// dd(Redis::hGetAll('logs:sascar'));

			{ /* No exportador */	

				$apelido = 'sascar'; 
				Redis::set("exportador:{$apelido}", strval(Carbon::now())); // Sempre deixar o prefixo 'exportador:'

				// echo Redis::get('log:sascar');
			}
 
			die;

		}

		return view('index', ['projetos' => $projetos]);
	}

    public function store(Request $request)
	{
		$user = new User;
		$user->name = $request->nome;
		$user->email = $request->email;
		$user->password = Hash::make($request->senha);

		$user->save();

		dd($user);

		return 'Okay';
	}
}

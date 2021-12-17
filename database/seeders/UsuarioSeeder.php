<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
			'name' => 'Lucas Scemist',
			'email' => 'scemist.lucas@gmail.com',
			'password' => bcrypt('nightmare')
		];

		if (User::where('email', '=', $dados['email'])->count()) {
			$usuario = User::where('email', '=', $dados['email'])->first();
			$usuario->update($dados);
			echo "Usuário Alterado!";
		} else {
			User::create($dados);
			echo "Usuário Criado!";
		}
    }
}

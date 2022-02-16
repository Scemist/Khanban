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
			'name' => 'admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin')
		];

		if (User::where('email', '=', $dados['email'])->count()) {
			$usuario = User::where('email', '=', $dados['email'])->first();
			$usuario->update($dados);
			echo 'Usuário Alterado!', PHP_EOL;
		} else {
			User::create($dados);
			echo 'Usuário Criado!', PHP_EOL;
		}
    }
}

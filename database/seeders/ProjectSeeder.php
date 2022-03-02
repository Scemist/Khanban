<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$project = new Project;
		$project->owner_id = 1;
		$project->title = 'Organizar as Planilhas';
		$project->description = 'Aqui ficam todas as tarefas relacionadas à organização das planilhas.';
		$project->save();

		echo 'Projeto criado!', PHP_EOL;
    }
}

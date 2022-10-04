<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->call(UserSeeder::class);
        // User::factory(10)->create();

		$this->call(ProjectSeeder::class);
		$this->call(ColumnSeeder::class);
    }
}

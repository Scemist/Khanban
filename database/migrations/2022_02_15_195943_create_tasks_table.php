<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
			$table->id();
			$table->foreignId('designated_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
			$table->foreignId('column_id')
				->references('id')
				->on('columns')
				->onDelete('cascade');
			$table->foreignId('tag_id')
				->references('id')
				->on('tags');
			$table->foreignId('category_id')
				->references('id')
				->on('categories');
			$table->string('description');
			$table->string('reference');
			$table->smallInteger('position');
			$table->tinyText('color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};

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
			$table->foreignId('designated_id')->nullable()->references('id')->on('users')->onDelete('cascade');
			$table->foreignId('column_id')->nullable()->references('id')->on('columns')->onDelete('cascade');
			$table->foreignId('category_id')->nullable()->references('id')->on('categories');
			$table->foreignId('owner_id')->references('id')->on('users');

			$table->string('title');
			$table->string('description')->nullable();
			$table->string('reference')->nullable();
			$table->smallInteger('position')->nullable();
			$table->tinyText('color')->nullable();
			$table->date('event')->nullable();
			$table->date('expiration')->nullable();
			
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

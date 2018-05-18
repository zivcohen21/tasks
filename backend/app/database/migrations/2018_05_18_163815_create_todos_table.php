<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('todo', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->boolean('isCompleted');
            $table->timestamps();
        });
    }

        public function down()
        {
            Schema::dropIfExists('todo');
        }

}

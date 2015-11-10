<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('todo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->nullable();
			$table->foreign('project_id')->references('id')->on('project');
            $table->integer('todo_status_id');
			$table->foreign('todo_status_id')->references('id')->on('todo_status');
            $table->integer('priority')->default(0);
			$table->text('text')->nullable();
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
        Schema::drop('todo');
    }
}

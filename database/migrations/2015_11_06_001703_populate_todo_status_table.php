<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateTodoStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		DB::table('todo_status')->insert(array('name' => 'open',));
		DB::table('todo_status')->insert(array('name' => 'closed',));
		DB::table('todo_status')->insert(array('name' => 'resolved',));
		DB::table('todo_status')->insert(array('name' => 'waiting',));
		DB::table('todo_status')->insert(array('name' => 'postponed',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		DB::table('todo_status')->delete();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoStatus extends Model
{
	protected $table = 'todo_status';
	protected $fillable = ['name',];
}

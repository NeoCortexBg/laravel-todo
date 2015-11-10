<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Form\TodoFilterFormBuilder;

class Todo extends Model
{
	protected $table = 'todo';
	protected $fillable = [
		'project_id',
		'todo_status_id',
		'priority',
		'text',
	];

	public static function getFiltered($filter = array())
	{
		$orderBy = TodoFilterFormBuilder::getOrderByList();

		$res = self::join('todo_status', 'todo.todo_status_id', '=', 'todo_status.id')
			->select('todo.*', 'todo_status.name AS status');

		if(!empty($filter)){
			if(!empty($filter['order_by'])){
				$res->orderBy(isset($orderBy[$filter['order_by']]) ? $filter['order_by'] : key($orderBy) , ((!empty($filter['order_dir']) && $filter['order_dir'] === 'asc') ? $filter['order_dir'] : 'desc'));
			}
			if(!empty($filter['project_id'])){
				$res->where('todo.project_id', '=', (int)$filter['project_id']);
			}
			if(!empty($filter['todo_status_id'])){
				$res->where('todo.todo_status_id', '=', (int)$filter['todo_status_id']);
			}
		}

		return $res->get();
	}
}

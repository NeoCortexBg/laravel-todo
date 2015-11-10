<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Todo;
use App\Http\Requests\StoreTodoPostRequest;
use Illuminate\Support\Facades\Input;

class TodoController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		return view('todo.index', [
			'todos' => Todo::getFiltered(Input::get('filter')),
		]);
	}

	public function store(StoreTodoPostRequest $request)
	{
		$todo = Todo::findOrNew($request->id)->fill($request->all());

		if(!empty($todo->text)) {
			$todo->save();
		}

		return redirect()->back();
	}
}

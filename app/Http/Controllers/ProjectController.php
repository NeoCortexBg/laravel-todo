<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\Http\Requests\DestroyProjectRequest;
use App\Todo;

class ProjectController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		return view('project.index', [
			'projects' => Project::all(),
		]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:100',
		]);

		Project::create([
			'name' => $request->name,
		]);

		return redirect('/projects');
	}

	public function destroy(Project $project)
	{
		if(!$project->hasOne(Todo::class)->exists()) {
			$project->delete();
		}

		return redirect('/projects');
	}
}

@extends('layout.todo')

@section('content')

	@include('todo.todo-filter-form')

	@include('todo.todo-form')

    @if (count($todos) > 0)
		@foreach ($todos as $todo)
			@include('todo.todo-form', [
				'todo' => $todo,
			])
		@endforeach
    @endif

@endsection

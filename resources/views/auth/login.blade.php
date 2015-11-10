@extends('layout.todo', [
	'bodyClass' => 'login'
])

@section('content')

	<form class="form-signin" action="<?php echo url('/login');?>" method="POST">
		{{ csrf_field() }}
		<h1 class="form-signin-heading">Login</h1>
		<input type="text" value="" placeholder="Email address" class="form-control" name="email">
		<input type="password" value="" placeholder="Password" class="form-control" name="password">
		<input type="submit" value="Login" class="btn btn-lg btn-primary btn-block" name="submit">
		<p></p>
		<p class='text-center'>or</p>
		<a href='<?php echo url('/register');?>' class="btn btn-lg btn-default btn-block">Register</a>
	</form>



@endsection
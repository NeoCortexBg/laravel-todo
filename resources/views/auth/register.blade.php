@extends('layout.todo', [
	'bodyClass' => 'login'
])

@section('content')

	<form class="form-signin" action="<?php echo url('/register');?>" method="POST">
		{{ csrf_field() }}
		<h1 class="form-signin-heading">Register</h1>
		<input type="text" value="" placeholder="Name" class="form-control" name="name">
		<input type="text" value="" placeholder="Email address" class="form-control" name="email">
		<input type="password" value="" placeholder="Password" class="form-control" name="password">
		<input type="password" value="" placeholder="Confirm Password" class="form-control" name="password_confirmation">
		<input type="submit" value="Register" class="btn btn-lg btn-primary btn-block" name="submit">
		<p></p>
		<p class='text-center'>or</p>
		<a href='<?php echo url('/login');?>' class="btn btn-lg btn-default btn-block">Login</a>
	</form>



@endsection
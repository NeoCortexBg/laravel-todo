@extends('layout.todo')

@section('content')

<h1>Projects</h1>


<form class='form-inline' method='post' style='margin-bottom: 10px;'>
	{{ csrf_field() }}
	<input type='text' class='form-control' placeholder='Name' name='name'>
	<button type='submit' class='btn btn-primary'>Create Project</button>
</form>




<?php if(!$projects->isEmpty()) { ?>
<table class='table'>
	<tr>
		<th>id</th>
		<th>name</th>
		<th></th>
	</tr>
	<?php foreach($projects as $p) { ?>
		<tr>
			<td>{{$p->id}}</td>
			<td>{{$p->name}}</td>
			<td>
				<form class='form-delete-project' action="/project/{{ $p->id }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button class='btn btn-danger btn-xs'>Delete</button>
				</form>
			</td>
		</tr>
	<?php } ?>
</table>
<?php } else { ?>
		No projects yet
<?php } ?>

<script type='text/javascript'>
	$(document).ready(function(){
		$('form.form-delete-project').submit(function(e){
			if(!confirm('Do you really want to delete the project ?')) {
				e.preventDefault();
			}
		});
	});
</script>


@endsection

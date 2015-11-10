<?php
use App\Todo;

if(isset($todo)) {
	$action = 'update_todo';
	$status = "status-" . $todo->status;
	$dateCreated = $todo->created_at->toDateTimeString();
	$submitButtonLabel = "Save";
	$submitButtonClass = "btn-primary";
} else {
	$action = 'create_todo';
	$todo = new Todo();
	$status = "";
	$dateCreated = "";
	$submitButtonLabel = "Add";
	$submitButtonClass = "btn-success";
}
?>
<div class="todo {{$status}}">
	<!--<form class="form-todo" action="/" method="POST">-->
	<?php echo  TodoForm::model($todo, ['url' => $_SERVER['REQUEST_URI'], 'method' => 'post']) ;?>
		<div class="left col-lg-1">
			<input type="hidden" value="{{$action}}" name="action">
			<!--<input type="hidden" value="3" name="todo_sid">-->
			<?php echo TodoForm::hidden('id'); ?>
			<div class="date-created">
				<label>
					<span class="date">{{$dateCreated}}</span>
				</label>
			</div>
			<div class="priority">
				<label>
					<span class="label-name">Priority</span>
					<!--<input type="text" value="1" name="priority">-->
					<?php echo TodoForm::text('priority'); ?>
				</label>
			</div>
			<div class="project">
				<label>
					<span class="label-name">Project</span>
					<?php echo TodoForm::selectProject('project_id'); ?>
<!--					<select name="project_sid">
						<option value="">--- Project ---</option>
						<option value="2">foo bar</option>
						<option value="3">project 123</option>
					</select>-->
				</label>
			</div>
			<div class="status">
				<label>
					<span class="label-name">Status</span>
					<?php echo TodoForm::selectStatus('todo_status_id'); ?>
<!--					<select name="todo_status_sid">
						<option selected="selected" value="1">open</option>
						<option value="2">closed</option>
						<option value="3">resolved</option>
						<option value="4">waiting</option>
						<option value="5">postponed</option>
					</select>-->
				</label>
			</div>
			<div class="submit">
<!--				<input type="submit" value="Save" class="btn btn-sm btn-block btn-primary" name="submit">-->
				<?php echo TodoForm::submit($submitButtonLabel, ['class' => 'btn btn-sm btn-block ' . $submitButtonClass]); ?>
			</div>
		</div>
		<div class="right col-lg-11">
			<!--<textarea rows="5" name="text">ascsd</textarea>-->
			<?php echo TodoForm::textarea('text', null, ['rows' => 5]); ?>
		</div>
	<?php echo TodoForm::close() ;?>
	<!--</form>-->
	<div class="cleared"></div>
</div>

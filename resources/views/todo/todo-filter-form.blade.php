
<?php echo  TodoFilterForm::model($_GET, ['url' => '/', 'method' => 'get']) ;?>
	<label>
		<span>Order by</span>
		<?php echo TodoFilterForm::selectOrderBy('filter[order_by]'); ?>
	</label>
	<label>
		<span>Order Dir</span>
		<?php echo TodoFilterForm::select('filter[order_dir]', [
			'desc' => 'Desc',
			'asc' => 'Asc',
		]); ?>
	</label>
	<label>
		<span>Project</span>
		<?php echo TodoFilterForm::selectProject('filter[project_id]'); ?>
	</label>
	<label>
		<span>Status</span>
		<?php echo TodoFilterForm::selectStatus('filter[todo_status_id]'); ?>
	</label>
	<input type="submit" value="Filter" />
<?php echo TodoFilterForm::close() ;?>
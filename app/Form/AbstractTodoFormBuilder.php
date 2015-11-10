<?php

namespace App\Form;

use \Collective\Html\FormBuilder;

use App\Project;
use App\TodoStatus;

abstract class AbstractTodoFormBuilder extends FormBuilder
{
	protected static $projectList;
	protected static $statusList;

	protected function getProjectList()
	{
		if(!isset(self::$projectList)) {
			self::$projectList = array_replace([
				'' => '--- Project ---',
			], Project::lists('name', 'id')->toArray());
		}

		return self::$projectList;
	}

	protected function getStatusList()
	{
		if(!isset(static::$statusList)) {
			$this->setStatusList();
		}

		return static::$statusList;
	}

	public function selectProject($name, $selected = null, $options = [])
	{
		return $this->select($name, $this->getProjectList(), $selected, $options);
	}

	public function selectStatus($name, $selected = null, $options = [])
	{
		return $this->select($name, $this->getStatusList(), $selected, $options);
	}

	protected function setStatusList()
	{
		static::$statusList = TodoStatus::lists('name', 'id');
	}

}
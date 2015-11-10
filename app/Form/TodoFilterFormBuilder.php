<?php

namespace App\Form;

//use \Collective\Html\FormBuilder;

use App\Project;
use App\TodoStatus;
use App\Form\AbstractTodoFormBuilder;

class TodoFilterFormBuilder extends AbstractTodoFormBuilder
{
	protected static $statusList;

	public function __construct(\Collective\Html\HtmlBuilder $html, \Illuminate\Routing\UrlGenerator $url, $csrfToken)
	{
		parent::__construct($html, $url, $csrfToken);
	}

	protected function setStatusList()
	{
		parent::setStatusList();

		static::$statusList = array_replace([
			'' => '--- Status ---',
		], static::$statusList->toArray());

	}

	public function selectOrderBy($name, $selected = null, $options = [])
	{
		return $this->select($name, static::getOrderByList(), $selected, $options);
	}

	public static function getOrderByList()
	{
		return [
			'created_at' => 'Date Created',
			'priority' => 'Priority',
			'status_id' => 'Status',
			'project_id' => 'Project',
		];
	}


}

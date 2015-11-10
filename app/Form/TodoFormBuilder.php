<?php

namespace App\Form;

//use \Collective\Html\FormBuilder;

use App\Project;
use App\TodoStatus;
use App\Form\AbstractTodoFormBuilder;

class TodoFormBuilder extends AbstractTodoFormBuilder
{

	/**
	 * Run old only IF this is the form that was submitted
	 *
	 * @param  string $name
	 *
	 * @return mixed
	 */
	public function old($name)
	{
		if($this->isOld()) {
			return parent::old($name);
		}
	}

	/**
	 * Check whether the currently being printed form is the form that was submitted
	 */
	public function isOld()
	{
		if(isset($this->session) && isset($this->model)) {
			return $this->session->getOldInput('id') === $this->model->id ;
		}

		//no session => no old form
		return false;
	}

}

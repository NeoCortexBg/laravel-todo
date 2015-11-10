<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreTodoPostRequest extends Request
{

	public function initialize(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
	{
		$this->sanitize($request);
		parent::initialize($query, $request, $attributes, $cookies, $files, $server, $content);
	}

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'action' => 'required|in:create_todo,update_todo',
            'id' => 'required_if:action,update_todo|exists:todo,id',
            'text' => 'min:1|max:10000',
            'todo_status_id' => 'required|numeric|exists:todo_status,id',
            'project_id' => 'numeric|exists:project,id',
            'priority' => 'required',
        ];
    }

	public function sanitize(array &$input)
	{
		if(isset($input['id'])) {
			$input['id'] = (int)$input['id'];
			if(empty($input['id'])) {
				$input['id'] = null;
			}
		}
		if(isset($input['todo_status_id'])) {
			$input['todo_status_id'] = (int)$input['todo_status_id'];
		}
		if(isset($input['priority'])) {
			$input['priority'] = (int)$input['priority'];
		}
		if(isset($input['project_id'])) {
			$input['project_id'] = (int)$input['project_id'];
			if(empty($input['project_id'])) {
				$input['project_id'] = null;
			}
		}
		if(isset($input['text'])) {
			$input['text'] = strip_tags($input['text']);
			$input['text'] = trim($input['text']);
		}
	}
}

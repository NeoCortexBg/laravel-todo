<?php

namespace App\Form;

use Illuminate\Support\Facades\Facade;

/**
 * @see TodoFilterFormBuilder
 */
class TodoFilterFormFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'todofilterform';
    }
}

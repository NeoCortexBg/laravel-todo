<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Form\TodoFormBuilder;
use App\Form\TodoFilterFormBuilder;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('todoform', function ($app) {

            $form = new TodoFormBuilder($app['html'], $app['url'], $app['session.store']->getToken());

            return $form->setSessionStore($app['session.store']);
        });

        $this->app->singleton('todofilterform', function ($app) {
            $form = new TodoFilterFormBuilder($app['html'], $app['url'], $app['session.store']->getToken());

            return $form->setSessionStore($app['session.store']);
        });

		$this->app->alias('todoform', TodoFormBuilder::class);
        $this->app->alias('todofilterform', TodoFilterFormBuilder::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
			'todoform',
			'todofilterform',
		];
    }
}

<?php

namespace App\Providers;

use App\Macros\Macros;
use Collective\Html\HtmlServiceProvider;

// use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends HtmlServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        parent::register();

        $this->app->bindShared('form', function ($app) {
            $form = new Macros($app['html'], $app['url'], $app['session.store']->getToke());
            return $fom->setSessionStore($app['session.store']);
        });

    }
}

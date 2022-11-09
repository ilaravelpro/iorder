<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole())
        {
            if (iorder('database.migrations.include', true)) $this->loadMigrationsFrom(iorder_path('database/migrations'));
        }
        View::addLocation(iorder_path('resources/views'));
        $this->mergeConfigFrom(iorder_path('config/iorder.php'), 'ilaravel.main.iorder');
    }

    public function register()
    {
        parent::register();
    }
}

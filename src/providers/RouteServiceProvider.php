<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function register()
    {
        parent::register();
    }

    public function map(Router $router)
    {
        if (iorder('routes.api.status', true)) $this->apiRoutes($router);
        if (iorder('routes.web.status', true)) $this->webRoutes($router);
    }

    public function apiRoutes(Router $router)
    {
        $router->group([
            'namespace' => '\iLaravel\iOrder\iApp\Http\Controllers\API',
            'prefix' => 'api',
            'middleware' => 'api'
        ], function ($router) {
            require_once(iorder_path('routes/api.php'));
        });
    }

    public function webRoutes(Router $router)
    {
        $router->group([
            'namespace' => '\iLaravel\iOrder\iApp\Http\Controllers\WEB',
            'prefix' => '',
            'middleware' => 'web'
        ], function ($router) {
            require_once(iorder_path('routes/web.php'));
        });
    }
}

<?php

namespace spiderwebtr\isauth;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class isAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views/', 'isAuth');
        Blade::include('isAuth::assets', 'isAuthAssets');
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->publishes([
            __DIR__.'/resources/assets/' => public_path('assets/SpiderWebtr/isAuth/'),
        ], 'public');
        $this->publishes([
            __DIR__.'/config/' => config_path('/'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}

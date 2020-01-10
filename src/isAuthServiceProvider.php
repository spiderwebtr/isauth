<?php

namespace spiderwebtr\isauth;

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
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->publishes([
            __DIR__.'/resources/assets/' => public_path('assets/SpiderWebtr/isAuth/'),
            __DIR__.'/config/' => config_path('/'),
        ], 'public');
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

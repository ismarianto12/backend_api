<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class App_parServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app('path') . '/Helpers/App_par.php';
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
    }
}

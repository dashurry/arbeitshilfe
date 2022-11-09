<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ArbeitshilfeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include_once app_path() . '/Helper.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

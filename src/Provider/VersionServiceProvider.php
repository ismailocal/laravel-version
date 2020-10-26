<?php

namespace LaravelVersion\Provider;

use Illuminate\Support\ServiceProvider;
use LaravelVersion\Command\Generate;

class VersionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            Generate::class
        ]);
    }
}

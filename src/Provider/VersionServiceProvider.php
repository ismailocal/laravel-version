<?php

namespace LaravelVersion\Provider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaravelVersion\Command\Check;
use LaravelVersion\Command\Generate;
use LaravelVersion\Command\Reset;
use LaravelVersion\Command\Up;
use LaravelVersion\Helper\Version;
use LaravelVersion\Helper\VersionHelper;

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
        Blade::directive('version', function ($expression) {
            return Version::toString();
        });

        $this->commands([
            Generate::class,
            Reset::class,
            Up::class,
            Check::class,
        ]);
    }
}

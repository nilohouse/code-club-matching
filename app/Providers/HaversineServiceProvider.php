<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HaversineServiceProvider extends ServiceProvider
{
    protected $defer = true;
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
        $this->app->bind('App\Helpers\Contracts\DistanceCalculatorContract', function() {
            return new HaversineImpl();
        });
    }

    public function provides()
    {
        return ['Aṕp\Helpers\Contracts\DistanceCalculatorContract'];
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\NearbyClubsListingImpl;

use Vinelab\Http\Client as HttpClient;
use App\Helpers\HaversineImpl;

class NearbyClubsListingServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\Contracts\NearbyClubsListingContract', function() {
            return new NearbyClubsListingImpl(new HaversineImpl(), new HttpClient());
        });
    }

    public function provides()
    {
        return ['App\Helpers\Contracts\NearbyClubsListingContract'];
    }
}

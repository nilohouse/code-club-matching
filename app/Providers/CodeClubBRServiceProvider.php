<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Helpers\CodeClubBR;

use Vinelab\Http\Client as HttpClient;

class CodeClubBRServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Helpers\Contracts\CodeClubBRContract', function() {
            return new CodeClubBR(new HttpClient);
        });
    }

    public function provides()
    {
        return ['App\Helpers\Contracts\CodeClubBRContract'];
    }
}

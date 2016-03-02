<?php

namespace Serrex\RestBunble;

use Illuminate\Support\ServiceProvider;
use Serrex\RestBunble\Core\Api;

class RestBundleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('api', Api::class);
    }
}

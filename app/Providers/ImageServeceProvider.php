<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImageServeceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Contracts\ImageServiceInterface::class,
            \App\Service\ImageService::class
        );
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

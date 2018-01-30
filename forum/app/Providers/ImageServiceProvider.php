<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
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

        /*
        $this->app->bind('\App\Services\ImageList', function ($app) {
            $imageList = new \App\Services\ImageList();

            
            $imageList->addImage();

            return $imageList;
        });
        */
    }
}

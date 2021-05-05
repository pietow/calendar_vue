<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GalleryRepository;
use App\Repositories\GalleryInterface;

class GalleryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* $this->app->bind(GalleryInterface::class, GalleryRepository::class); */
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CmsInterface;
use App\Repositories\PostRepository;
use App\Http\Controllers\CmsPostController;
use App\Http\Controllers\CmsGalleryController;
use App\Repositories\GalleryRepository;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* $this->app->bind(CmsInterface::class, PostRepository::class); */
        $this->app->when(CmsPostController::class)
          ->needs(CmsInterface::class)
          ->give(function () {
              return new PostRepository;
          });
        $this->app->when(CmsGalleryController::class)
          ->needs(CmsInterface::class)
          ->give(function () {
              return new GalleryRepository;
          });
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

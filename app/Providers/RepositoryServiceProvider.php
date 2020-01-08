<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{Ads\AdInterface,
    Ads\AdRepository,
    Comments\CommentsInterface,
    Comments\CommentsRepository,
    Favorites\FavoriteInterface,
    Favorites\FavoriteRepository,
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AdInterface::class,
            AdRepository::class
        );

        $this->app->bind(
            FavoriteInterface::class,
            FavoriteRepository::class
        );

        $this->app->bind(
            CommentsInterface::class,
            CommentsRepository::class
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

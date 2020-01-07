<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\ViewComposers\CategoryComposer');
        $this->app->singleton('App\Http\ViewComposers\CountryComposer');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        view()->composer(
            ['partials.categoryNav', 'lists.categories'], 'App\Http\ViewComposers\CategoryComposer'
        );

        view()->composer('lists.countries', 'App\Http\ViewComposers\CountryComposer');
        view()->composer('lists.currencies', 'App\Http\ViewComposers\CurrencyComposer');

    }
}

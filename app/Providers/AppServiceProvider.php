<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Contracts\Services\StoreServiceContract', 'App\Services\Store\FakeStoreService');
        $this->app->bind('App\Contracts\Services\ProductServiceContract', 'App\Services\ProductService');

        $this->app->bind('App\Contracts\Handlers\FetchProductsHandlerContract', 'App\Handlers\FetchProductsHandler');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\CategoryService;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        /*
            Bind the CategoryService to the CategoryContract. This will be helpful in the future if we need to change
            the package that controls our Nested Set implementation.
        */
        $this->app->bind(
            'App\Contracts\CategoryContract',
            'App\Services\CategoryService'
        );


        $this->app->bind('CategoryService', function ($app) {
            return new CategoryService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

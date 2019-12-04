<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryService;
use App\Services\EntryService;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
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
            Bind our custom contracts (interfaces) to concrete services to allow implied injection in controllers.
        */
        $this->app->bind(
            'App\Contracts\CategoryContract',
            'App\Services\CategoryService'
        );

        $this->app->bind(
            'App\Contracts\EntryContract',
            'App\Services\EntryService'
        );


        $this->app->bind('CategoryService', function ($app) {
            return new CategoryService();
        });

        $this->app->bind('EntryService', function ($app) {
            return new EntryService();
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MessagesInterfaces;
use App\Repositories\CacheMessages; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services. 
     */
    public function boot(): void
    {
        $this->app->bind(
            MessagesInterfaces::class,
            CacheMessages::class
        );
    }
}

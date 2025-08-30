<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MovieRepository;
use MovieRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            MovieRepositoryInterface::class,
            MovieRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

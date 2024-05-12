<?php

namespace App\Providers;

use App\Services\RaceFeatureService;
use App\Services\ScoreIncreaseService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('ScoreIncreaseService', function($app) {
            return new ScoreIncreaseService();
        });
        $this->app->bind('RaceFeatureService', function($app) {
            return new RaceFeatureService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

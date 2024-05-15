<?php

namespace App\Providers;

use App\Services\RaceFeatureService;
use App\Services\ScoreIncreaseService;
use App\Services\TraitsService;
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
        $this->app->bind('TraitsService', function($app) {
            return new TraitsService();
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

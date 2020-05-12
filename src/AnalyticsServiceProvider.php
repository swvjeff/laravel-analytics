<?php

namespace Swvjeff\Analytics;

use Illuminate\Support\ServiceProvider;

class AnalyticsServiceProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/analytics.php', 'analytics');

        $this->app->bind(Analytics::class, function () {
            $config = config('analytics');
            return new Analytics($config['tracking_id'], $config['secondary_tracking_ids']);
        });
        
        $this->app->alias(Analytics::class, 'laravel-analytics');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/analytics.php' => config_path('analytics.php'),
        ]);
        $this->loadViewsFrom(__DIR__.'/../views', 'laravel-analytics');
    }
}

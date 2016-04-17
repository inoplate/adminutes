<?php

namespace Inoplate\Adminutes;

use Illuminate\Support\ServiceProvider;

class AdminutesServiceProvider extends ServiceProvider
{
    /**
     * Boot package
     * 
     * @return void
     */
    public function boot()
    {
        $this->loadPublic();
        $this->loadViews();
        $this->loadConfiguration();
    }

    /**
     * Register the authenticator services.
     *
     * @return void
     */
    public function register(){}

    /**
     * Publish public assets
     * @return void
     */
    protected function loadPublic()
    {
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/inoplate-adminutes'),
        ], 'public');
    }

    /**
     * Load  package's views
     * @return void
     */
    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'inoplate-adminutes');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/inoplate-adminutes'),
        ], 'views');
    }

    /**
     * Load package configuration
     * 
     * @return void
     */
    protected function loadConfiguration()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/adminutes.php', 'inoplate.adminutes'
        );

        $this->publishes([
            __DIR__.'/../config/adminutes.php' => config_path('inoplate/adminutes.php'),
        ], 'config');
    }
}
<?php

namespace Naifmhd\Gazette;

use Illuminate\Support\ServiceProvider;

class GazetteServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'naifmhd');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'naifmhd');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/gazette.php', 'gazette');

        // Register the service the package provides.
        $this->app->singleton('gazette', function ($app) {
            return new Gazette;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['gazette'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/gazette.php' => config_path('gazette.php'),
        ], 'gazette.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/naifmhd'),
        ], 'gazette.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/naifmhd'),
        ], 'gazette.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/naifmhd'),
        ], 'gazette.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

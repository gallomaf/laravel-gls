<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GLSServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/gls.php';
        $this->mergeConfigFrom($configPath, 'gls');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $configPath = __DIR__ . '/../config/gls.php';
        $this->publishes([$configPath => config_path('gls.php')]);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gls');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/gls'),
        ]);


    }
}

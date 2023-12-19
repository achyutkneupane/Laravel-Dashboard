<?php

namespace AchyutN\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Load views from the package
         *
         * @method loadViewsFrom
         */
        if (method_exists($this, 'loadViewsFrom')) {
            $this->loadViewsFrom(__DIR__.'/../views', 'dashboard');
        }

        /**
         * Load routes from the package
         *
         * @method loadRoutesFrom
         */
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        /**
         * Publish the config file
         *
         * @method publishes
         */
        $this->publishes([
            __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
            __DIR__.'/../views/sidebar.blade.php' => resource_path('views/livewire/components/sidebar.blade.php'),
            __DIR__.'/../views/navbar.blade.php' => resource_path('views/livewire/components/navbar.blade.php'),
            __DIR__.'/../views/layout.blade.php' => resource_path('views/layouts/app.blade.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
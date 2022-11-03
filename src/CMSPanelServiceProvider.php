<?php

namespace AkshyataTech\CMSPanel;

use Illuminate\Support\ServiceProvider;

class CMSPanelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'cmspanel');
        $this->publishes([
            __DIR__.'/config/cmspanel.php' => config_path('cmspanel.php'),
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
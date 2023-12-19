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
         * Publish the config and view files
         *
         * @method publishes
         */
        if(method_exists($this, 'publishes')) {

            $composer_packages = json_decode(file_get_contents(base_path('composer.lock')), true)['packages'];
            $livewire_version = null;
            foreach ($composer_packages as $package) {
                if ($package['name'] == 'livewire/livewire') {
                    $livewire_version = $package['version'];
                }
            }
            $livewire_version = explode('.', $livewire_version)[0];
            $livewire_version = (int)substr($livewire_version, 1);

            $path = $livewire_version >= 3 ? 'components/' : '';

            $this->publishes([
                __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
                __DIR__.'/../views/sidebar.blade.php' => resource_path('views/'.$path.'livewire/components/sidebar.blade.php'),
                __DIR__.'/../views/navbar.blade.php' => resource_path('views/'.$path.'livewire/components/navbar.blade.php'),
                __DIR__.'/../views/layout.blade.php' => resource_path('views/'.$path.'layouts/app.blade.php'),
                __DIR__.'/../views/sass/sidebar.scss' => resource_path('sass/sidebar.scss'),
            ]);
        }
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
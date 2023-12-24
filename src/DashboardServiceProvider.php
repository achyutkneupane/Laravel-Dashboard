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
            $this->loadViewsFrom(__DIR__.'/views', 'dashboard');
        }

        /**
         * Load routes from the package
         *
         * @method loadRoutesFrom
         */
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

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

            $viewPath = $livewire_version >= 3 ? 'components/' : '';
            $compPath = $livewire_version >= 3 ? '' : 'Http/';

            if($livewire_version >= 3) {
                $this->publishes([
                    __DIR__.'/LiveWire/Sidebar.php' => app_path('Livewire/Components/Sidebar.php'),
                    __DIR__.'/LiveWire/Navbar.php' => app_path('Livewire/Components/Navbar.php'),
                ]);
            } else {
                $this->publishes([
                    __DIR__.'/LiveWire/Sidebarv2.php' => app_path('Http/Livewire/Components/Sidebar.php'),
                    __DIR__.'/LiveWire/Navbarv2.php' => app_path('Http/Livewire/Components/Navbar.php'),
                ]);
            }

            $this->publishes([
                __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
                __DIR__.'/views/sidebar.blade.php' => resource_path('views/livewire/components/sidebar.blade.php'),
                __DIR__.'/views/navbar.blade.php' => resource_path('views/livewire/components/navbar.blade.php'),
                __DIR__.'/views/layout.blade.php' => resource_path('views/'.$viewPath.'layouts/app.blade.php'),

                __DIR__.'/sass/_variables.scss' => resource_path('sass/_variables.scss'),
                __DIR__.'/sass/app.scss' => resource_path('sass/app.scss'),
                __DIR__.'/sass/sidebar.scss' => resource_path('sass/sidebar.scss'),

                __DIR__.'/assets/images/sidebg.svg' => public_path('images/sidebg.svg'),

                __DIR__.'/stubs/' => base_path('stubs/'),
            ]);
        }

        $bootstrap_js = file_get_contents(resource_path('js/bootstrap.js'));
        if(strpos($bootstrap_js, "import 'bootstrap';") === false) {
            $bootstrap_js = "import 'bootstrap';\n" . $bootstrap_js;
            file_put_contents(resource_path('js/bootstrap.js'), $bootstrap_js);
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
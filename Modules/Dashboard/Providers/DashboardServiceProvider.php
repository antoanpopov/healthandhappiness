<?php

namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Composers\SidebarViewCreator;
use Modules\Core\Commands;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . '/../Helpers/Images.php';
    }

    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'dashboard');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'dashboard');
        // Bind breadcrumbs package
        $this->app->register(RouteServiceProvider::class);
        view()->creator('dashboard.layouts._sidebar', SidebarViewCreator::class);


        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('HelperImages', \Modules\Dashboard\Helpers\Images::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}

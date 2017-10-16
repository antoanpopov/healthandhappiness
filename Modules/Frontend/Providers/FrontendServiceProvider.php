<?php

namespace Modules\Frontend\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Composers\SidebarViewCreator;
use Modules\Core\Commands;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'frontend');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'frontend');

        $this->app->register(RouteServiceProvider::class);
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

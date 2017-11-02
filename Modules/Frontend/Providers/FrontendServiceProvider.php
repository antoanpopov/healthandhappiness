<?php

namespace Modules\Frontend\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make(\Illuminate\Database\Eloquent\Factory::class)->load(__DIR__ . '/../Database/Factories');
    }

    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'frontend');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'frontend');

        $this->app->register(RouteServiceProvider::class);
        Config::set('breadcrumbs.view','frontend::partials._breadcrumbs');

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

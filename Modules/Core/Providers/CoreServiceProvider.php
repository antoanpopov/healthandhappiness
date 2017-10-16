<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Commands\SeedCommand;
use Modules\Dashboard\Providers\DashboardServiceProvider;

class CoreServiceProvider extends ServiceProvider
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
        $this->app->register(
            SidebarServiceProvider::class
        );

        $this->app->register(
            FormMacrosServiceProvider::class
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                SeedCommand::class,
            ]);
        }

        $this->app->register(DashboardServiceProvider::class);
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

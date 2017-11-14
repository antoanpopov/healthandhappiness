<?php

namespace Modules\Frontend\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Frontend\Composers;

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
        View::composer('frontend::widgets.tags', Composers\PostsTagsViewComposer::class);
        View::composer('frontend::widgets.categories', Composers\PostsCategoriesViewComposer::class);
        View::composer('frontend::widgets.categories', Composers\PostsSearchViewComposer::class);

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

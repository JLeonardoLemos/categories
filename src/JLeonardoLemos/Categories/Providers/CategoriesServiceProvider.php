<?php

namespace JLeonardoLemos\Categories\Providers;

use App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JLeonardoLemos\Categories\CategoryHandler;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Contracts\Events\Dispatcher;

class CategoriesServiceProvider extends ServiceProvider {

    /**
     * Register the News module service provider.
     *
     * @return void
     */
    public function register() {
        // This service provider is a convenient place to register your modules
        // services in the IoC container. If you wish, you may make additional
        // methods or service providers to keep the code more focused and granular.
        $this->bindFacades();

        $loader = AliasLoader::getInstance();
        $loader->alias('Category', 'JLeonardoLemos\Categories\Facades\CategoryFacade');
    }

    public function boot(Dispatcher $events){
        parent::boot($events);
        App::register('JLeonardoLemos\Categories\Providers\RouteServiceProvider');
        App::register('JLeonardoLemos\Categories\Providers\EventServiceProvider');
        $this->publishesMigrations();        
    }

    private function bindFacades() {

        $this->app->bind('Mixd\Category\Select', function($app) {
            return new CategoryHandler();
        });
    }

    protected function publishesMigrations()
    {

        $this->publishes([
            realpath(__DIR__.'/../Database/Migrations/') => $this->app->databasePath().'/migrations'
        ], 'migrations');

    }

}

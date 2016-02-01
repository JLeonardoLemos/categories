<?php

namespace JLeonardoLemos\Categories\Providers;

use Caffeinated\Modules\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use JLeonardoLemos\Categories\Category;

class RouteServiceProvider extends ServiceProvider {

    /**
     * This namespace is applied to the controller routes in your module's routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'JLeonardoLemos\Categories\Http\Controllers';

    /**
     * Define your module's route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router) {
        parent::boot($router);

        $router->bind('categories', function($id) {
            $category = Category::find($id);
            if (!$category) {
                abort(404);
            }

            return $category;
        });
    }

    /**
     * Define the routes for the module.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router) {
        $router->group(['namespace' => $this->namespace], function($router) {
            require (realpath(__DIR__ . '/../Http/routes.php'));
        });
    }

}

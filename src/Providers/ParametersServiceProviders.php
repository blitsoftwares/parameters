<?php
namespace Blit\Parameters\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ParametersServiceProviders extends ServiceProvider
{

    protected $dir_route;
    protected $dir_config;
    protected $dir_views;
    protected $dir_migration;

    /**
     * Register services
     *
     * @return void
     */
    public function register()
    {
        $this->dir_route        = __DIR__ . '/../routes';
        $this->dir_config       = __DIR__ . '/../config';
        $this->dir_views        = __DIR__ . '/../resources/views';
        $this->dir_migration    = __DIR__ . '/../database/migrations';

        $this->mergeConfigFrom($this->dir_config . DIRECTORY_SEPARATOR . 'parameters.php','parameter');
    }

    /**
     * Bootstrap service.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * LOADERS
         */
        $this->loadMigrationsFrom($this->dir_migration);
        $this->loadViewsFrom($this->dir_views,'parameter');
        $this->loadRoutes();

        /**
         *  PUBLISHES
         */
        $this->publishes([$this->dir_views => resource_path('views/vendor/parameter')],'blit-parameter-views');
        $this->publishes([$this->dir_config . DIRECTORY_SEPARATOR . 'parameters.php'  => config_path('parameters.php')],'blit-parameter-config');
    }



    /**
     * Register routes this package
     *
     * @return void
     */
    protected function loadRoutes()
    {
        Route::namespace("Blit\\Parameters\\Http\\Controllers")
            ->prefix(config('parameter.route_prefix'))
            ->middleware(config('parameter.route_middleware'))
            ->group($this->dir_route . DIRECTORY_SEPARATOR . 'web.php');
    }
}

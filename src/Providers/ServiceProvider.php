<?php

namespace ubitcorp\Cities\Providers;

use Illuminate\Database\Eloquent\Factory;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerModels();
        $this->registerFactories();
        $this->registerLanguage();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('cities.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'cities'
        );
    }


    protected function registerLanguage()
    {
        $ln = config("cities.language", "en");   
        app()->instance('city_language', $ln); //it needed by some models        
    }

    /**
     * Register models.
     *
     * @return void
     */
    protected function registerModels()
    {
        
        $this->publishes([
            __DIR__.'/../Models/' => app_path(),
        ], 'models');
        
        
    }    


    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/city');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'city');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'city');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}

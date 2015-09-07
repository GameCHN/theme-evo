<?php namespace YC\Evo\Providers;

use Illuminate\Support\ServiceProvider;
use YC\Evo\ThemeManager;

class EvoServiceProvider extends ServiceProvider
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
    public function boot() {
        $this->registerConfig();
        $this->registerTranslations();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        kd('test');

        //
        // Register 'thememanager' instance container to our ThemeManager object
        $this->app['thememanager'] = $this->app->share(function ($app) {
            return new ThemeManager();
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('ThemeManager', ThemeManager::class);
        });

    }

    /**
     * Register config.
     *
     * @return void
     */
    protected
    function registerConfig() {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('evo.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'evo'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public
    function registerViews() {
        $viewPath = base_path('resources/views/modules/evo');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom([$viewPath, $sourcePath], 'evo');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public
    function registerTranslations() {
        $langPath = base_path('resources/lang/modules/evo');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'evo');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'evo');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public
    function provides() {
        return array();
    }

}

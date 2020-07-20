<?php

namespace Mireon\SlidePanels\Laravel\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Mireon\SlidePanels\Laravel\Levers\Lever;
use Mireon\SlidePanels\Laravel\SlidePanels;
use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The main service provider.
 *
 * @package Mireon\SlidePanels\Laravel\Providers
 */
class MainServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();

        $this->app->singleton(SlidePanels::class, fn() => SlidePanels::getInstance());
        $this->app->singleton(SlidePanelsInterface::class, fn() =>
            Config::get('slide-panels.main', SlidePanels::class)::getInstance()
        );
        $this->app->bind(Lever::class, fn() => new Lever());
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();
    }

    /**
     * Register views.
     *
     * @return void
     */
    private function registerViews(): void
    {
        $folders = 'vendor/mireon/slide-panels';
        $views = __DIR__ . '/../../resources/views';
        $resources = resource_path("views/$folders");

        $this->loadViewsFrom(array_merge(array_map(fn($path) =>
            "$path/$folders"
        , Config::get('view.paths')), [$views]), 'slide-panels');

        $this->publishes([$views => $resources], 'views');
    }

    /**
     * Register config.
     *
     * @return void
     */
    private function registerConfig(): void
    {
        $config = __DIR__ . '/../../resources/config/config.php';

        $this->mergeConfigFrom($config, 'slide-panels');
        $this->publishes([$config => config_path('slide-panels.php')], 'config');
    }
}

<?php

namespace Mireon\SlidePanels\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use Mireon\SlidePanels\Laravel\Levers\Lever;
use Mireon\SlidePanels\Laravel\SlidePanels;
use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The main service provider.
 *
 * @package Mireon\SlidePanels\Laravel\Providers
 */
class SlidePanelsServiceProvider extends ServiceProvider
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
        $this->app->singleton(SlidePanelsInterface::class, function () {
            $class = config('slide-panels.base', SlidePanels::class);
            return $class::getInstance();
        });
        $this->app->bind(Lever::class, fn() => new Lever());
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootViews();
    }

    /**
     * Bootstrap the views.
     *
     * @return void
     */
    private function bootViews(): void
    {
        $folders = 'vendor/mireon/slide-panels';
        $views = __DIR__ . '/../../resources/views';
        $resources = resource_path("views/$folders");

        $this->loadViewsFrom(array_merge(array_map(fn($path) =>
            "$path/$folders"
        , config('view.paths')), [$views]), 'slide-panels');

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

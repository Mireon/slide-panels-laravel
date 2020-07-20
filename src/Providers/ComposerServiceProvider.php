<?php

namespace Mireon\SlidePanels\Laravel\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * The composer service provider.
 *
 * @package Mireon\SlidePanels\Laravel\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $views = Config::get('slide-panels.views');

        if (!empty($views)) {
            View::composer($views, 'Mireon\SlidePanels\Laravel\Http\View\Composers\SlidePanelsComposer');
        }
    }
}

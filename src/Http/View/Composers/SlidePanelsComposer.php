<?php

namespace Mireon\SlidePanels\Laravel\Http\View\Composers;

use Illuminate\View\View;
use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The composer for the package.
 *
 * @package Mireon\SlidePanels\Laravel\Http\View\Composers
 */
class SlidePanelsComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     *   A view instance.
     *
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('slidePanels', app(SlidePanelsInterface::class)::getInstance());
    }
}

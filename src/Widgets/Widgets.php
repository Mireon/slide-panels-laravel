<?php

namespace Mireon\SlidePanels\Laravel\Widgets;

use Mireon\SlidePanels\Widgets\Widgets as BaseWidgets;
use Throwable;

/**
 * The widgets container.
 *
 * @package Mireon\SlidePanels\Laravel\Widgets
 */
class Widgets extends BaseWidgets
{
    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view('slide-panels::widgets.widgets')->with('widgets', $this)->render();
    }
}

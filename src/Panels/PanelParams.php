<?php

namespace Mireon\SlidePanels\Laravel\Panels;

use Mireon\SlidePanels\Panels\PanelParams as BasePanelParams;
use Throwable;

/**
 * The panel styles container.
 *
 * @package Mireon\SlidePanels\Laravel\Panels
 */
class PanelParams extends BasePanelParams
{
    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view('slide-panels::panels.panel-params')
            ->with('panel', $this->getPanel())
            ->with('params', $this)
            ->render();
    }
}

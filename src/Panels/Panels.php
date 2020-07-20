<?php

namespace Mireon\SlidePanels\Laravel\Panels;

use Exception;
use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Panels\Panels as BasePanels;
use Throwable;

/**
 * The panels container.
 *
 * @package Mireon\SlidePanels\Laravel\Panels
 */
class Panels extends BasePanels
{
    /**
     * Creates a newly panel.
     *
     * @param string $key
     *   A key panel
     *
     * @return PanelInterface
     *
     * @throws Exception
     */
    public function createPanel(string $key): PanelInterface
    {
        $panel = new Panel($key);
        $this->addPanel($panel);

        return $panel;
    }

    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view('slide-panels::panels.panels')->with('panels', $this)->render();
    }
}

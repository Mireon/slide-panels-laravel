<?php

namespace Mireon\SlidePanels\Laravel\Widgets\Close;

use Mireon\SlidePanels\Widgets\Close\Close as BaseClose;
use Throwable;

/**
 * The widget to hide a panel.
 *
 * @package Mireon\SlidePanels\Laravel\Widgets\Close
 */
class Close extends BaseClose
{
    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view('slide-panels::widgets.close.close')
            ->with('close', $this)
            ->render();
    }
}

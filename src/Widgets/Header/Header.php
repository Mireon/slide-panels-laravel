<?php

namespace Mireon\SlidePanels\Laravel\Widgets\Header;

use Mireon\SlidePanels\Widgets\Header\Header as BaseHeader;
use Throwable;

/**
 * The header widget.
 *
 * @package Mireon\SlidePanels\Laravel\Widgets\Header
 */
class Header extends BaseHeader
{
    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view('slide-panels::widgets.header.header')
            ->with('header', $this)
            ->render();
    }
}

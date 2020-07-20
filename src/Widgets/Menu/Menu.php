<?php

namespace Mireon\SlidePanels\Laravel\Widgets\Menu;

use Mireon\SlidePanels\Widgets\Menu\Menu as BaseMenu;

/**
 * The menu widget.
 *
 * @package Mireon\SlidePanels\Laravel\Widgets\Menu
 */
class Menu extends BaseMenu
{
    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return view('slide-panels::widgets.menu.menu')
            ->with('menu', $this)
            ->render();
    }
}

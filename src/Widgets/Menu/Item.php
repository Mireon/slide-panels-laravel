<?php

namespace Mireon\SlidePanels\Laravel\Widgets\Menu;

use Mireon\SlidePanels\Widgets\Menu\Item as BaseItem;

/**
 * The menu item.
 *
 * @package Mireon\SlidePanels\Laravel\Widgets\Menu
 */
class Item extends BaseItem
{
    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return view('slide-panels::widgets.menu.item')
            ->with('item', $this)
            ->render();
    }
}

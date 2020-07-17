<?php

namespace Mireon\SlidePanels\Laravel\Examples\Catalog;

use Exception;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Item;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Menu;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The widget after the catalog.
 *
 * @package Mireon\SlidePanels\Laravel\Examples\Catalog
 */
class CatalogAfter implements PanelFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function doMake(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/catalog';

        $slidePanels->getPanel(Catalog::KEY)
            ->widget(Menu::create()
                ->weight(15)
                ->item(Item::create('Other', "$url/other")));
    }
}

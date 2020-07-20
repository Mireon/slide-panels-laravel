<?php

namespace Mireon\SlidePanels\Laravel\Examples\Catalog;

use Exception;
use Illuminate\Http\Request;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Html\Html;

/**
 * The widget before the catalog.
 *
 * @package Mireon\SlidePanels\Laravel\Examples\Catalog
 */
class CatalogBefore implements PanelFactoryInterface
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
     */
    public function getFactories(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $slidePanels
            ->panel(Catalog::KEY)
            ->widget(Html::create()
                ->weight(5)
                ->html('<span style="display: block; padding: 10px; color: #ababab;">The main catalog!</span>'));
    }
}

<?php

namespace Mireon\SlidePanels\Laravel\Examples\Catalog;

use Exception;
use Illuminate\Http\Request;
use Mireon\SlidePanels\Laravel\Widgets\Close\Close;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Item;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Menu;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Laravel\Widgets\Header\Header;

/**
 * The catalog.
 *
 * @package Mireon\SlidePanels\Laravel\Examples\Catalog
 */
class Catalog implements PanelFactoryInterface
{
    /**
     * The panel key.
     */
    public const KEY = 'catalog';

    /**
     * The request.
     *
     * @var Request
     */
    private Request $request;

    /**
     * The constructor.
     *
     * @param Request $request
     *   A request.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function getFactories(): array
    {
        return [
            CatalogAfter::class,
            CatalogBefore::class,
        ];
    }

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
        $url = $this->request->getSchemeAndHttpHost() . '/catalog';

        $slidePanels
            ->panel(self::KEY)
            ->width(960)
            ->side(Panel::LEFT)
            ->widget(Close::create()
                ->icon('fa fa-close')
                ->text('Close'))
            ->widget(Header::create()
                ->weight(0)
                ->size(Header::BIG)
                ->icon('fa fa-th')
                ->text('Catalog'))
            ->widget(Menu::create()
                ->weight(10)
                ->item(Item::create('Electronics', "$url/electronics", 'fa fa-headphones'))
                ->item(Item::create('Construction & Repair', "$url/construction-&-tools", 'fa fa-wrench'))
                ->item(Item::create('Home & Garden', "$url/construction-&-tools", 'fa fa-home'))
                ->item(Item::create('Health & Beauty', "$url/health-&-beauty", 'fa fa-magic'))
                ->item(Item::create('Sport & Tourism', "$url/sport-&-tourism", 'fa fa-plane')));
    }
}

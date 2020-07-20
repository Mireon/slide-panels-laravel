<?php

namespace Mireon\SlidePanels\Laravel\Examples\Account;

use Exception;
use Illuminate\Http\Request;
use Mireon\SlidePanels\Laravel\Examples\Catalog\Catalog;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Item;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Menu;
use Mireon\SlidePanels\Levers\Lever;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The account panel for the authenticated user.
 *
 * @package Mireon\SlidePanels\Laravel\Examples\Account
 */
class AccountAuthenticated implements PanelFactoryInterface
{
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
        return [];
    }

    /**
     * @inheritDoc
     */
    public function doMake(): bool
    {
        return $this->request->has('user');
    }

    /**
     * @inheritDoc
     *
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $host = $this->request->getSchemeAndHttpHost();
        $query = 'user[name]=User';

        $slidePanels
            ->panel(Account::KEY)
            ->widget(Menu::create()
                ->item(Item::create('Profile', "$host?$query"))
                ->item(Item::create('Settings', "$host?$query"))
                ->item(Lever::create('Catalog', Catalog::KEY))
                ->item(Item::create('Logout', $host)));
    }
}

<?php

namespace Mireon\SlidePanels\Laravel\Examples\Account;

use Exception;
use Illuminate\Http\Request;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Item;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Menu;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The account panel for the anonymous user.
 *
 * @package Mireon\SlidePanels\Laravel\Examples\Account
 */
class AccountAnonymous implements PanelFactoryInterface
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
        return !$this->request->has('user');
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
                ->item(Item::create('Login', "$host?page=login&$query"))
                ->item(Item::create('Register', "$host?page=register&$query")));
    }
}

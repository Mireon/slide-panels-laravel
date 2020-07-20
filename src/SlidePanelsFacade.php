<?php

namespace Mireon\SlidePanels\Laravel;

use Illuminate\Support\Facades\Facade;
use Mireon\SlidePanels\SlidePanelsInterface;

/**
 * The facade for SlidePanels package.
 *
 * @package Mireon\SlidePanels\Laravel
 */
class SlidePanelsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return SlidePanelsInterface::class;
    }
}

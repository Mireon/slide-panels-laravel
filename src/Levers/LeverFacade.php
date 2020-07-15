<?php

namespace Mireon\SlidePanels\Laravel\Levers;

use Illuminate\Support\Facades\Facade;

/**
 * The facade for lever.
 *
 * @package Mireon\SlidePanels\Laravel\Levers
 */
class LeverFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Lever::class;
    }
}

<?php

namespace Mireon\SlidePanels\Laravel\Levers;

use Mireon\SlidePanels\Levers\Lever as BaseLever;
use Throwable;

/**
 * The lever to show of hide a panel.
 *
 * @package Mireon\SlidePanels\Levers
 */
class Lever extends BaseLever
{
    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view("slide-panels::levers.{$this->getType()}")->with('lever', $this)->render();
    }
}

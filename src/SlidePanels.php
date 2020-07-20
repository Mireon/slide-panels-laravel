<?php

namespace Mireon\SlidePanels\Laravel;

use Mireon\SlidePanels\SlidePanels as BaseSlidePanels;
use Mireon\SlidePanels\Laravel\Stage\Stage;

/**
 * The main class.
 *
 * @package Mireon\SlidePanels\Laravel
 */
class SlidePanels extends BaseSlidePanels
{
    /**
     * The constructor.
     */
    protected function __construct()
    {
        $this->setStage(new Stage());
    }

    /**
     * @inheritDoc
     */
    public function createFactoryFromString(string $factory): object
    {
        return app($factory);
    }
}

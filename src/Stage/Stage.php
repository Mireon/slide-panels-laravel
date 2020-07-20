<?php

namespace Mireon\SlidePanels\Laravel\Stage;

use Exception;
use Mireon\SlidePanels\Laravel\Panels\Panels;
use Mireon\SlidePanels\Stage\Stage as BaseStage;
use Throwable;

/**
 * The stage.
 *
 * @package Mireon\SlidePanels\Laravel\Stage
 */
class Stage extends BaseStage
{
    /**
     * The constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct(new Panels());
    }

    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view('slide-panels::stage.stage')->with('stage', $this)->render();
    }
}

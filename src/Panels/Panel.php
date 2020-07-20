<?php

namespace Mireon\SlidePanels\Laravel\Panels;

use Exception;
use Mireon\SlidePanels\Laravel\Widgets\Widgets;
use Mireon\SlidePanels\Panels\Panel as BasePanel;
use Throwable;

/**
 * The panel.
 *
 * @package Mireon\SlidePanels\Laravel\Panels
 */
class Panel extends BasePanel
{
    /**
     * The constructor.
     *
     * @param string|null $key
     *   A panel key.
     * @param string|null $side
     *   A panel side.
     *
     * @throws Exception
     */
    public function __construct(?string $key = null, ?string $side = null)
    {
        parent::__construct($key, $side);
        $this->setParams(new PanelParams($this));
        $this->setWidgets(new Widgets());
    }

    /**
     * @inheritDoc
     *
     * @throws Throwable
     */
    public function render(): string
    {
        return view('slide-panels::panels.panel')->with('panel', $this)->render();
    }
}

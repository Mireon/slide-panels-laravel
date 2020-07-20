<?php

use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Panels\PanelsInterface;

/**
 * Prints the panels container.
 *
 * @var PanelsInterface $panels
 *   The panels container.
 * @var PanelInterface $panel
 *   A panel.
 */
?>

<div class="slide-panels__panels">
    @foreach($panels as $panel)
        {!! $panel->render() !!}
    @endforeach
</div>

<?php

use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\Panels;

/**
 * Prints the panels container.
 *
 * @var Panels $panels
 *   The panels container.
 * @var Panel $panel
 *   A panel.
 */
?>

<div class="slide-panels__panels">
    @foreach($panels as $panel)
        {!! $panel !!}
    @endforeach
</div>

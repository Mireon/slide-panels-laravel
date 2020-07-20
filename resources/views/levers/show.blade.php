<?php

use Mireon\SlidePanels\Laravel\Levers\Lever;

/**
 * Prints a lever to show a panel.
 *
 * @var Lever $lever
 *   A lever.
 */
?>

<a href="#" class="slide-panels__lever slide-panels__lever-show" data-element="lever" data-action="show" data-target="{{ $lever->getPanel() }}">
    {{ $lever->getText() }}
</a>

<?php

use Mireon\SlidePanels\Laravel\Levers\Lever;

/**
 * Prints a lever to hide a panel.
 *
 * @var Lever $lever
 *   A lever.
 */
?>

<a href="#" class="slide-panels__lever slide-panels__lever-hide" data-element="lever" data-action="hide">
    {{ $lever->getText() }}
</a>

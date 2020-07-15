<?php

use Mireon\SlidePanels\Laravel\Stage\Stage;

/**
 * Prints the stage.
 *
 * @var Stage $stage
 *   The stage.
 */
?>

<div id="slide-panels" class="slide-panels slide-panels__stage slide-panels__stage_hidden">
    <div class="slide-panels__backstage slide-panels__backstage_hidden" data-element="backstage"></div>
    <div class="slide-panels__close-space" data-element="lever" data-action="hide"></div>
    {!! $stage->hasPanels() && $stage->getPanels()->hasPanels() ? $stage->getPanels() : '' !!}
</div>

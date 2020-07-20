<?php

use Mireon\SlidePanels\Panels\PanelInterface;

/**
 * Prints a panel.
 *
 * @var PanelInterface $panel
 *   A panel.
 */
?>

<div class="slide-panels__panel slide-panels__panel-{{ $panel->getKey() }} slide-panels__panel_{{ $panel->getSide() }} slide-panels__panel_hidden slide-panels__panel_outside slide-panels__panel_{{ $panel->getSide() }}_outside" data-element="panel" data-key="{{ $panel->getKey() }}" data-side="{{ $panel->getSide() }}">
    {!! $panel->hasParams() && $panel->getParams()->doUse() ? $panel->getParams()->render() : '' !!}
    {!! $panel->hasWidgets() ? $panel->getWidgets()->render() : '' !!}
</div>

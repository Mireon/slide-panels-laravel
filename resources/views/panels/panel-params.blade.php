<?php

use Mireon\SlidePanels\Panels\PanelInterface;
use Mireon\SlidePanels\Panels\PanelParamsInterface;

/**
 * Prints styles for a panel.
 *
 * @var PanelInterface $panel
 *   A panel.
 * @var PanelParamsInterface $params
 *   A panel styles.
 */
?>

@php($panelWidth = "{$params->getWidth()}px")
@php($screenWidth = $params->getWidth() + 30 . 'px')
@php($currentPanel = "slide-panels__panel-{$panel->getKey()}")
@php($outside = ".$currentPanel.slide-panels__panel_{$panel->getSide()}_outside")
@php($slideInside = ".$currentPanel.slide-panels__panel_{$panel->getSide()}_slide-inside")
@php($slideOutside = ".$currentPanel.slide-panels__panel_{$panel->getSide()}_slide-outside")
@php($animationSlideInside = "{$currentPanel}_slide-inside")
@php($animationSlideOutside = "{$currentPanel}_slide-outside")

<style type="text/css">
    @keyframes {{ $animationSlideInside }} {
        from { {{ $panel->getSide() }}: -{{ $panelWidth }}; }
        to { {{ $panel->getSide() }}: 0; }
    }

    @keyframes {{ $animationSlideOutside }} {
        from { {{ $panel->getSide() }}: 0; }
        to { {{ $panel->getSide() }}: -{{ $panelWidth }}; }
    }

    .{{ $currentPanel }} {
        width: {{ $panelWidth }};
    }

    {{ $outside }} {
        {{ $panel->getSide() }}: -{{ $panelWidth }};
    }

    {{ $slideInside }} {
        animation-name: slide-panels__panel-{{ $panel->getKey() }}_slide-inside;
        -webkit-animation-name: slide-panels__panel-{{ $panel->getKey() }}_slide-inside;
    }

    {{ $slideOutside }} {
        animation-name: slide-panels__panel-{{ $panel->getKey() }}_slide-outside;
        -webkit-animation-name: slide-panels__panel-{{ $panel->getKey() }}_slide-outside;
    }

    @media screen and (max-width: {{ $screenWidth }}) {
        @keyframes {{ $animationSlideInside }} {
            from { {{ $panel->getSide() }}: -100vw; }
            to { {{ $panel->getSide() }}: 0; }
        }

        @keyframes {{ $animationSlideOutside }} {
            from { {{ $panel->getSide() }}: 0; }
            to { {{ $panel->getSide() }}: -100vw; }
        }

        .{{ $currentPanel }} {
            width: calc(100vw - 30px);
        }

        {{ $outside }} {
            {{ $panel->getSide() }}: -100vw;
        }
    }
</style>

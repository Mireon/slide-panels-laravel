<?php

use Mireon\SlidePanels\Widgets\Close\Close;

/**
 * Prints the close widget.
 *
 * @var Close $close
 *   A close widget.
 */


?>

@php($specialClass = $close->hasKey() ? "slide-panels__close-{$close->getKey()}" : '')

<a href="#" class="slide-panels__close {{ $specialClass }}" data-element="lever" data-action="hide">
    @if($close->hasIcon())
        <i class="slide-panels__close__icon {{ $close->getIcon() }}"></i>
    @endif
    @if($close->hasText())
        <span class="slide-panels__close__text">{{ $close->getText() }}</span>
    @endif
</a>

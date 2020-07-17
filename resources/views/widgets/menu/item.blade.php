<?php

use Mireon\SlidePanels\Widgets\Menu\ItemInterface;

/**
 * Prints a menu item.
 *
 * @var ItemInterface $item
 *   A menu item.
 */
?>

<a href="{{ $item->getUrl() }}" class="slide-panels__menu__link">
    @if($item->hasIcon())
        <i class="slide-panels__menu__icon {{ $item->getIcon() }}"></i>
    @endif
    <span class="slide-panels__menu__text">{{ $item->getText() }}</span>
</a>

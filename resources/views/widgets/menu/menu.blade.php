<?php

use Mireon\SlidePanels\Widgets\Menu\ItemInterface;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Menu;

/**
 * Prints the menu widget.
 *
 * @var Menu $menu
 *   A menu widget.
 * @var ItemInterface $item
 *   A menu item.
 */

$specialClass = $menu->hasKey() ? "slide-panels__menu-{$menu->getKey()}" : '';
?>

<div class="slide-panels__menu {{ $specialClass }}">
    @if($menu->hasItems())
        <ul class="slide-panels__menu__list">
            @foreach($menu as $item)
                <li class="slide-panels__menu__item">
                    {!! $item->render() !!}
                </li>
            @endforeach
        </ul>
    @endif
</div>

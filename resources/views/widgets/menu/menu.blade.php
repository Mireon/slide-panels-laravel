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

<div class="slide-panels__menu <?= $specialClass; ?>">
    <?php if ($menu->hasItems()): ?>
        <ul class="slide-panels__menu__list">
            <?php foreach ($menu as $item): ?>
                <li class="slide-panels__menu__item">
                    <?= $item->render(); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

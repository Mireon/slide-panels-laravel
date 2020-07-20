# The SlidePanels

[![PHP](https://img.shields.io/badge/php-7.4-green.svg?color=red)](https://github.com/Mireon/yandex-turbo)
[![Size](https://img.shields.io/github/repo-size/mireon/slide-panels-laravel?color=green)](https://github.com/Mireon/yandex-turbo)
[![License](https://img.shields.io/github/license/mireon/slide-panels-laravel?color=green)](https://github.com/Mireon/yandex-turbo)
[![Release](https://img.shields.io/github/v/release/mireon/slide-panels-laravel?color=red)](https://github.com/Mireon/yandex-turbo)

![The presentation](https://github.com/Mireon/slide-panels/blob/master/docs/movies/presentation.gif?raw=true)

## Install

Install via [Composer](https://getcomposer.org/):

```sh
$ composer require mireon/slide-panels-laravel
```

## Display

#### CSS and JS

The resource files are located in the following paths:
- `vendor/mireon/slide-panels/resources/assets/styles/slide-panels.min.css`
- `vendor/mireon/slide-panels/resources/assets/scripts/slide-panels.min.js`

Copy these files to your the public directory and add them to a page.

```blade
<html>
    <head>
        <link href="https://example.com/css/slide-panels.min.css" rel="stylesheet" type="text/css">
        <script src="https://example.com/js/slide-panels.min.js"></script>    
    </head>
</html>
```

#### HTML

To display panels, you must output the "SlidePanels" instance on a page. Do this at the end of the body tag.

If you are using the "views" configuration option from the `config/slide-panels.php` file, output the "slidePanels" variable.

```blade
<html>
    <body>
        {!! $slidePanels !!}
    </body>
</html>
```

Otherwise, output the "SlidePanel" instance.

```blade
<html>
    <body>
        {!! SlidePanels::getInstance() !!}
    </body>
</html>
```

## Code

#### Add a panel via the "SlidePanel" instance.

Add code like the following where it will executed, for example, in a controller.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\SlidePanels;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

class Controller extends BaseController
{
    public function index(SlidePanels $slidePanels): View
    {
        $slidePanels
            ->panel('main')
            ->width(320)
            ->side(Panel::LEFT)
            ->widget(Header::create('Main menu', 'fa fa-bars'))
            ->widget(Menu::create()
                ->key('main-menu')
                ->item(Item::create('Catalog', 'https://example.com/catalog'))
                ->item(Item::create('News', 'https://example.com/news'))
                ->item(Item::create('Services', 'https://example.com/services'))
                ->item(Item::create('Forum', 'https://example.com/forum'))
                ->item(Item::create('Profile', 'https://example.com/profile')));

        return view('welcome');
    }
}
```

#### Add a panel via a panel factory

You can find more of panel factories in the path [vendor/mireon/slide-panels-laravel/src/Examples](https://github.com/Mireon/slide-panels-laravel/tree/master/src/Examples).

Create a class that implements the "PanelFactoryInterface" interface.

```php
<?php

namespace App\SlidePanelFactories\MainMenu;

use Exception;
use Mireon\SlidePanels\Panels\Panel;
use Mireon\SlidePanels\Panels\PanelFactoryInterface;
use Mireon\SlidePanels\SlidePanelsInterface;
use Mireon\SlidePanels\Widgets\Header\Header;
use Mireon\SlidePanels\Widgets\Menu\Item;
use Mireon\SlidePanels\Widgets\Menu\Menu;

class MainMenu implements PanelFactoryInterface
{
    /**
     * If true is returned, the "make" method will be called
     * and all dependent factories will be added.
     * 
     * @return bool 
     */
    public function doMake(): bool
    {
        return true;
    }

    /**
     * Returns a list of dependent factories.
     * 
     * @return PanelFactoryInterface[]|string[]
     */
    public function getFactories(): array
    {
        return [];
    }

    /**
     * Make panels and add widgets.
     *
     * @param SlidePanelsInterface $slidePanels
     *   The "SlidePanel" instance.
     *
     * @return void
     * 
     * @throws Exception
     */
    public function make(SlidePanelsInterface $slidePanels): void
    {
        $slidePanels
            ->panel('main')
            ->width(960)
            ->side(Panel::RIGHT)
            ->widget(Header::create('Main menu', 'fa fa-bars'))
            ->widget(Menu::create()
                ->key('main-menu')
                ->item(Item::create('Catalog', 'https://example.com/catalog'))
                ->item(Item::create('News', 'https://example.com/news'))
                ->item(Item::create('Services', 'https://example.com/services'))
                ->item(Item::create('Forum', 'https://example.com/forum'))
                ->item(Item::create('Profile', 'https://example.com/profile')));
    }
}
```

And add it to the "SlidePanels" instance, for example, in a service provider.

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SlidePanelFactories\MainMenu;
use Mireon\SlidePanels\SlidePanelsInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app(SlidePanelsInterface::class)->factory(MainMenu::class);
    }
}
```

#### Add a lever to open a panel.

To open the panel, you need to add a lever to a page. A lever is any HTML tag that has required attributes. These are "data-element" with the "lever" value and "data-target" with a panel key. 

```blade
<html>
    <body>
        <a href="#" data-element="lever" data-action="show" data-target="main">Main</a>
    </body>
</html>
```

A simple way to create a lever is to use the "Lever" class, for example: 

```blade
<html>
    <body>
        {!! Lever::show('Main', 'main') !!}
    </body>
</html>
```

## Widgets

Few widgets supplied in a box: Header, Menu, Html, Close. You can create your own widgets and add them to a panel. To create a widget, you must create a class that implements the "WidgetInterface" interface.

#### Header

A HTML element containing an icon and text. A header can be small or big.

![The "Header" widget](https://github.com/Mireon/slide-panels/blob/master/docs/images/widgets-header.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Laravel\Widgets\Header\Header;

Header::create()
    ->key('account-header')
    ->weight(10)
    ->icon('fa fa-user')
    ->text('Account')
    ->size(Header::BIG);
```

#### Menu

A vertical list of items.

![The "Menu" widget](https://github.com/Mireon/slide-panels/blob/master/docs/images/widgets-menu.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Laravel\Widgets\Menu\Item;
use Mireon\SlidePanels\Laravel\Widgets\Menu\Menu;

Menu::create()
    ->key('main-menu')
    ->weight(10)
    ->items([
        Item::create('Catalog', 'https://example.com/catalog', 'fa fa-th'),
        Item::create('News', 'https://example.com/News', 'fa fa-clock-o'),
        Item::create('Services', 'https://example.com/services', 'fa fa-list-alt'),
    ])
    ->item(Item::create('Forum', 'https://example.com/forum', 'fa fa-headphones'))
    ->item(Item::create('Profile', 'https://example.com/profile', 'fa fa-user-o'));
```

#### Close

A lever to close a panel.

![The "Close" widget](https://github.com/Mireon/slide-panels/blob/master/docs/images/widgets-close.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Laravel\Widgets\Close\Close;

Close::create('Close', 'fa fa-close')
    ->key('panel-close')
    ->weight(-10)
    ->text('Close')
    ->icon('fa fa-close');
```

#### Html

Output the raw HTML.

![The "Html" widget](https://github.com/Mireon/slide-panels/blob/master/docs/images/widgets-html.jpg?raw=true)

```php
<?php

use Mireon\SlidePanels\Widgets\Html\Html;

Html::create()
    ->key('catalog-caption')
    ->weight(5)
    ->html('<span style="padding: 10px; color: #ababab;">The main catalog!</span>');
```

## Commands

Publish views.
```sh
$ php artisan vendor:publish --tag=views --force
```

Publish config.
```sh
$ php artisan vendor:publish --tag=config --force
```

## Tests

```sh
$ composer test
```

## License

Released under the [MIT License](https://opensource.org/licenses/MIT).

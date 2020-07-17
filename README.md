# The SlidePanels for Laravel

[![PHP](https://img.shields.io/badge/php-7.4-green.svg?color=red)](https://github.com/Mireon/yandex-turbo)
[![Size](https://img.shields.io/github/repo-size/mireon/slide-panels-laravel?color=green)](https://github.com/Mireon/yandex-turbo)
[![License](https://img.shields.io/github/license/mireon/slide-panels-laravel?color=green)](https://github.com/Mireon/yandex-turbo)
[![Release](https://img.shields.io/github/v/release/mireon/slide-panels-laravel?color=red)](https://github.com/Mireon/yandex-turbo)

## Install

Install via [Composer](https://getcomposer.org/):

```sh
$ composer require mireon/slide-panels-laravel
```

## Display

#### CSS and JS

The resource files are located in the folders:
 - /vendor/mireon/slide-panels/resources/assets/styles/slide-panels.min.css
 - /vendor/mireon/slide-panels/resources/assets/scripts/slide-panels.min.js
 
Copy them to the public directory and add them to a page.

```blade
<html>
    <head>
        <link href="{{ url('css/slide-panels.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ url('js/slide-panels.min.js') }}"></script>    
    </head>
</html>
```

#### HTML

To add panels, you must add the "SlidePanels" instance to a page. Add an instance to the end of the body tag.

If you use the "views" variable of the configuration file, you must print the "$slidePanels" variable.

```blade
<html>
    <body>
        {!! $slidePanels !!}
    </body>
</html>
```

Otherwise, you must print the instance of  "SlidePanels" fallow way.

```blade
<html>
    <body>
        {!! SlidePanels::getInstance() !!}
    </body>
</html>
```
        
## Coding

#### Title
Description.

```php
<?php

use Mireon\SlidePanels\Laravel\SlidePanels;

//
```

## Tests

```sh
$ composer test
```

## License

Released under the [MIT License](https://opensource.org/licenses/MIT).

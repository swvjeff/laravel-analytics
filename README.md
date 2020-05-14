# Add multiple Google Analytics tracking IDs with Laravel 

[![Latest Version](https://img.shields.io/github/release/swvjeff/laravel-analytics.svg?style=flat-square)](https://github.com/swvjeff/laravel-analytics/releases)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

A simple package that allows you to define multiple Google Analytics tracking IDs for your website

## Installation

This package can be installed using Composer:

``` bash
composer require swvjeff/laravel-analytics
```

Add your primary Analytics Tracking ID to your .env file

```
ANALYTICS_TRACKING_ID="UA-XXXXXXX-X"
```

If you want to add multiple tracking IDs, you can publish the config file of this package with the following command and hard-code the tracking IDs into the `secondary_tracking_ids` array:

``` bash
php artisan vendor:publish --provider="Swvjeff\Analytics\AnalyticsServiceProvider"
```

The following config file will be published in `config/analytics.php`

```php
return [
    'tracking_id' => env('ANALYTICS_TRACKING_ID'),

    'secondary_tracking_ids' => []
];
```

Additionally, you can add tracking IDs programmatically by calling `\Analytics::addTrackingId('UA-XXXXXXX-X')`.

## Example

Save your primary tracking ID to your .env file, the package will automatically detect it
```
ANALYTICS_TRACKING_ID="UA-9999999-1"
```

Add any additional tracking IDs to 
```php
use Analytics;

// Add any additional GA tracking IDs programmatically
Analytics::addTrackingId('UA-9999999-2');
Analytics::addTrackingId('UA-9999999-3');
```

Render your Analytics tracking script
```html
<!DOCTYPE html>
<html>
<head>
    {!! Analytics::render() !!}
</head>
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email jeff@selectwv.com instead of using the issue tracker.

## Credits

- [Jeff Smith](https://github.com/swvjeff)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

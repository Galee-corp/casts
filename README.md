# Value casting classes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/galee-corp/casts.svg?style=flat-square)](https://packagist.org/packages/galee-corp/casts)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/galee-corp/casts/run-tests?label=tests)](https://github.com/galee-corp/casts/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/galee-corp/casts/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/galee-corp/casts/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/galee-corp/casts.svg?style=flat-square)](https://packagist.org/packages/galee-corp/casts)

⚠️ ⚠️ ⚠️ DO NOT USE NOW - WORK IN PROGRESS !!! ⚠️ ⚠️ ⚠️

## Installation

You can install the package via composer:

```bash
composer require galee-corp/casts
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="casts-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage


### Galee\Casts\Types\Amount

```php
$amount = new Galee\Casts\Types\Amount('1234.56');
echo $amount->get();
```

or use the helper

```php
echo amount('1234.56');
// (float) 1234.56

echo amount(1234.56);
// (float) 1234.56

echo amount(1234);
// (int) 1234

echo amount(1234.0);
// (int) 1234

echo amount('fdsf-1234.56.12fsdfs');
// (float) -1234.56
```

### Galee\Casts\Types\Percentage

```php
$percentage = new Galee\Casts\Types\Percentage('12.34');
echo $percentage->get();
// (string) 12.34 %
```

or use the helper

```php
echo percentage('12.34');
// (string) 12.34 %

echo percentage(12.34);
// (string) 12.34 %

echo percentage(12);
// (string) 12 %

echo percentage(12.0);
// (string) 12 %

echo percentage('fdsf-12.56.12fsdfs');
// (string) -12.56 %
```

### Galee\Casts\Types\Ratio

```php
$ratio = new Galee\Casts\Types\Ratio('1.42');
echo $ratio->get();
// (string) 1.42 %
```

or use the helper

```php
echo ratio('1.34');
// (float) 1.34

echo ratio(1.34);
// (float) 1.34

echo ratio(1);
// (float) 1.0

echo ratio('fdsf-1.56.12fsdfs');
// (float) -1.56
```

### Galee\Casts\Types\ShortAmount

```php
$shortAmount = new Galee\Casts\Types\ShortAmount('1234');
echo $shortAmount->get();
// (string) 1.2 K
```

or use the helper

```php
echo shortAmount('1234.34');
// (string) 1.2 K

echo shortAmount(1234567);
// (string) 1.2 M

echo shortAmount(1234567890);
// (string) 1.2 B

echo shortAmount(1234567890000);
// (string) 1.2 T

echo shortAmount('fdsf-1234.56.12fsdfs');
// (string) -1.2 K
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Philippe Khill](https://github.com/phikhi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

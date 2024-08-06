# Pest Plugin Translatable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/katalam/pest-plugin-translatable.svg?style=flat-square)](https://packagist.org/packages/katalam/pest-plugin-translatable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/katalam/pest-plugin-translatable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/katalam/pest-plugin-translatable/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/katalam/pest-plugin-translatable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/katalam/pest-plugin-translatable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/katalam/pest-plugin-translatable.svg?style=flat-square)](https://packagist.org/packages/katalam/pest-plugin-translatable)

A Pest plugin to test the existence of translations.

## Installation

You can install the package via composer:

```bash
composer require katalam/pest-plugin-translatable
```

## Usage
```php
expect('app/')->toHaveNoEmptyTranslatable('de');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Katalam](https://github.com/Katalam)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

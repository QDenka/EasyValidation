EasyValidation
==============

EasyValidation is a PHP library that provides simple and easy-to-use validation functions for common types of data, such as email addresses, URLs, numbers, and dates.

Installation
------------

The recommended way to install EasyValidation is via [Composer](https://getcomposer.org/):

`composer require qdenka/easy-validation`

Usage
-----

### Validating an email address

```php
use QDenka\EasyValidation\Infrastructure\Validator;

if (Validator::isValidEmail('test@example.com')) {
    echo 'Valid email address';
} else {
    echo 'Invalid email address';
}
```

### Validating a URL

```php
use QDenka\EasyValidation\Infrastructure\Validator;

if (Validator::isValidUrl('http://www.example.com')) {
    echo 'Valid URL';
} else {
    echo 'Invalid URL';
}
```

### Validating a number

```php
use QDenka\EasyValidation\Infrastructure\Validator;

if (Validator::isValidNumber('123')) {
    echo 'Valid number';
} else {
    echo 'Invalid number';
}
```

### Validating a date

```php
use QDenka\EasyValidation\Infrastructure\Validator;

if (Validator::isValidDate('2023-04-23')) {
    echo 'Valid date';
} else {
    echo 'Invalid date';
}
```

Contributing
------------

Contributions are welcome! Please open an issue or a pull request if you find a bug or want to suggest an improvement.
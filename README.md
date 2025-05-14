# EasyValidation

[![Latest Stable Version](https://img.shields.io/packagist/v/qdenka/easyvalidation)](https://packagist.org/packages/qdenka/easyvalidation) [![License](https://img.shields.io/packagist/l/qdenka/easyvalidation)](LICENSE) [![Total Downloads](https://img.shields.io/packagist/dt/qdenka/easyvalidation)]()

**EasyValidation** is a lightweight PHP library for validating common data types. Built with DDD, SOLID, and DRY principles, it offers both a factory-based API and convenient static helper methods.

---

## 📋 Table of Contents

* [✨ Features](#-features)
* [⚙️ Requirements](#️-requirements)
* [🚀 Installation](#-installation)
* [🛠️ Usage](#️-usage)

    * [Factory API](#factory-api)
    * [Static Helpers](#static-helpers)
* [📑 Available Validators](#-available-validators)
* [⚙️ Configuration](#️-configuration)
* [🧩 Extending](#-extending)
* [🧪 Testing](#-testing)
* [🤝 Contributing](#-contributing)
* [📄 License](#-license)

---

## ✨ Features

* ✅ Validate emails (standard, Gmail-only, disposable)
* ✅ Validate URLs, numbers, dates
* ✅ Validate IPs (IPv4 & IPv6)
* ✅ Validate UUIDs (v1–v5)
* ✅ Validate JSON and Base64 strings
* ✅ Validate international phone numbers (E.164)
* 📦 PSR-4 autoloading
* 🔄 Factory-based API + static helpers
* ⚙️ Easily extendable with new validators

---

## ⚙️ Requirements

* PHP ^7.4 || ^8.0

---

## 🚀 Installation

Install with Composer:

```bash
composer require qdenka/easyvalidation
```

Autoloading is configured via PSR-4 (`QDenka\EasyValidation\`).

---

## 🛠️ Usage

### Factory API

Use `ValidatorFactory` to retrieve any validator by its type key:

```php
use QDenka\EasyValidation\Application\Validators\ValidatorFactory;

\$types = ['email','google_email','disposable_email','url','number','date','ip','uuid','json','base64','phone'];
foreach (\$types as \$type) {
    \$validator = ValidatorFactory::create(\$type);
    \$value = 'test_value_for_' . \$type;
    if (\$validator && \$validator->validate(\$value)) {
        echo "[\$type] valid\n";
    } else {
        echo "[\$type] invalid\n";
    }
}
```

### Static Helpers

For quick checks, use the `Validator` facade:

```php
use QDenka\EasyValidation\Infrastructure\Factories\Validator;

if (Validator::isValidEmail('user@example.com')) {
    echo "Valid email";
}

if (Validator::isGoogleMail('user@gmail.com')) {
    echo "It's a Gmail address";
}

if (!Validator::isDisposableEmail('temp@mailinator.com')) {
    echo "Disposable email detected";
}

// Other helpers:
Validator::isValidUrl('https://example.com');
Validator::isValidNumber('123.45');
Validator::isValidDate('2023-04-23');
Validator::isValidIp('2001:db8::1');
Validator::isValidUuid('550e8400-e29b-41d4-a716-446655440000');
Validator::isValidJson('{"foo":1}');
Validator::isValidBase64(base64_encode('hello'));  
Validator::isValidPhone('+1234567890');
```

---

## 📑 Available Validators

| Type               | Static Helper          | Description                           |
| ------------------ | ---------------------- | ------------------------------------- |
| `email`            | `isValidEmail()`       | RFC-compliant email                   |
| `google_email`     | `isGoogleMail()`       | Gmail & Googlemail domains            |
| `disposable_email` | `!isDisposableEmail()` | Blacklisted disposable domains        |
| `url`              | `isValidUrl()`         | HTTP/HTTPS URLs                       |
| `number`           | `isValidNumber()`      | Numeric values                        |
| `date`             | `isValidDate()`        | Date in `Y-m-d` (configurable format) |
| `ip`               | `isValidIp()`          | IPv4 & IPv6 addresses                 |
| `uuid`             | `isValidUuid()`        | UUID v1–v5                            |
| `json`             | `isValidJson()`        | JSON string parsing                   |
| `base64`           | `isValidBase64()`      | Base64-encoded data                   |
| `phone`            | `isValidPhone()`       | International E.164 phone numbers     |

---

## ⚙️ Configuration

### Disposable Domains List

Customize disposable email domains by editing `config/disposable_domains.php`:

```php
return [
    'mailinator.com',
    '10minutemail.com',
    // add your domains here
];
```

Ensure all domains are lowercase.

---

## 🧩 Extending

To add a new validator:

1. Implement `ValidatorInterface` in `src/Domain/YourType/YourValidator.php`.
2. Add your class to `VALIDATOR_MAP` in `src/Infrastructure/Factories/Validator.php`.
3. (Optional) Add a static helper in the same class.
4. Write tests under `tests/` following existing patterns.

---

## 🧪 Testing

Run PHPUnit:

```bash
vendor/bin/phpunit --colors
```

All tests must pass before merging.

---

## 🤝 Contributing

1. Fork repository
2. Create a feature branch (`git checkout -b feature/NewValidator`)
3. Commit changes (`git commit -m 'Add NewValidator'`)
4. Push (`git push origin feature/NewValidator`)
5. Open a Pull Request

Follow PSR-12 coding standards and include tests.

---

## 📄 License

This project is licensed under the MIT License. See [LICENSE](LICENSE) for details.

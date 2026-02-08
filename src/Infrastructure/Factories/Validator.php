<?php

namespace QDenka\EasyValidation\Infrastructure\Factories;

use QDenka\EasyValidation\Application\Validators\ValidatorFactory;
use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Class Validator
 *
 * Static facade that delegates all creation to ValidatorFactory.
 *
 * @package QDenka\EasyValidation\Infrastructure\Factories
 */
class Validator
{
    public static function isValidEmail(string $value): bool
    {
        return self::validate('email', $value);
    }

    public static function isGoogleMail(string $value): bool
    {
        return self::validate('google_email', $value);
    }

    /**
     * Returns true if the address is from a known disposable provider.
     */
    public static function isDisposableEmail(string $value): bool
    {
        return !self::validate('disposable_email', $value);
    }

    public static function isValidUrl(string $value): bool
    {
        return self::validate('url', $value);
    }

    public static function isValidNumber(string $value): bool
    {
        return self::validate('number', $value);
    }

    public static function isValidDate(string $value): bool
    {
        return self::validate('date', $value);
    }

    public static function isValidIp(string $value): bool
    {
        return self::validate('ip', $value);
    }

    public static function isValidUuid(string $value): bool
    {
        return self::validate('uuid', $value);
    }

    public static function isValidJson(string $value): bool
    {
        return self::validate('json', $value);
    }

    public static function isValidBase64(string $value): bool
    {
        return self::validate('base64', $value);
    }

    public static function isValidPhone(string $value): bool
    {
        return self::validate('phone', $value);
    }

    /**
     * Generic validation by type key.
     */
    public static function validate(string $type, string $value): bool
    {
        $validator = ValidatorFactory::create($type);

        return $validator !== null && $validator->validate($value);
    }

    /**
     * Proxy to ValidatorFactory::create().
     */
    public static function create(string $type): ?ValidatorInterface
    {
        return ValidatorFactory::create($type);
    }
}

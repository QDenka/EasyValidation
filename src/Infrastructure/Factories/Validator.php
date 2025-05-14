<?php

namespace QDenka\EasyValidation\Infrastructure\Factories;

use QDenka\EasyValidation\Application\Validators\ValidatorFactoryInterface;
use QDenka\EasyValidation\Application\Validators\ValidatorInterface;
use QDenka\EasyValidation\Domain\Date\DateValidator;
use QDenka\EasyValidation\Domain\Email\EmailValidator;
use QDenka\EasyValidation\Domain\Email\GoogleMailValidator;
use QDenka\EasyValidation\Domain\Email\DisposableEmailValidator;
use QDenka\EasyValidation\Infrastructure\Email\FileDisposableEmailDomainProvider;
use QDenka\EasyValidation\Domain\Number\NumberValidator;
use QDenka\EasyValidation\Domain\Url\UrlValidator;
use QDenka\EasyValidation\Domain\Ip\IpValidator;
use QDenka\EasyValidation\Domain\Uuid\UuidValidator;
use QDenka\EasyValidation\Domain\Json\JsonValidator;
use QDenka\EasyValidation\Domain\Base64\Base64Validator;
use QDenka\EasyValidation\Domain\Phone\PhoneNumberValidator;

/**
 * Class Validator
 *
 * Provides static helpers and implements a factory for all built-in validators.
 *
 * @package QDenka\EasyValidation\Infrastructure\Factories
 */
class Validator implements ValidatorFactoryInterface
{
    private const VALIDATOR_MAP = [
        'email'             => EmailValidator::class,
        'google_email'      => GoogleMailValidator::class,
        'disposable_email'  => DisposableEmailValidator::class,
        'url'               => UrlValidator::class,
        'number'            => NumberValidator::class,
        'date'              => DateValidator::class,
        'ip'                => IpValidator::class,
        'uuid'              => UuidValidator::class,
        'json'              => JsonValidator::class,
        'base64'            => Base64Validator::class,
        'phone'             => PhoneNumberValidator::class,
    ];

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
        return ! self::validate('disposable_email', $value);
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
     * Generic validation by type.
     *
     * @param string $type
     * @param string $value
     * @return bool
     */
    public static function validate(string $type, string $value): bool
    {
        $validator = self::create($type);

        return $validator && $validator->validate($value);
    }

    /**
     * @inheritdoc
     */
    public static function create(string $type): ?ValidatorInterface
    {
        if (! array_key_exists($type, self::VALIDATOR_MAP)) {
            return null;
        }

        $class = self::VALIDATOR_MAP[$type];

        if ($type === 'disposable_email') {
            $configPath = __DIR__ . '/../../../config/disposable_domains.php';
            $provider = new FileDisposableEmailDomainProvider($configPath);
            return new $class($provider);
        }

        return new $class();
    }
}

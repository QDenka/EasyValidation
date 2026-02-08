<?php

namespace QDenka\EasyValidation\Application\Validators;

use QDenka\EasyValidation\Domain\Contracts\ValidatorFactoryInterface;
use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;
use QDenka\EasyValidation\Domain\Ip\IpValidator;
use QDenka\EasyValidation\Domain\Uuid\UuidValidator;
use QDenka\EasyValidation\Domain\Json\JsonValidator;
use QDenka\EasyValidation\Domain\Base64\Base64Validator;
use QDenka\EasyValidation\Domain\Phone\PhoneNumberValidator;
use QDenka\EasyValidation\Domain\Email\EmailValidator;
use QDenka\EasyValidation\Domain\Email\GoogleMailValidator;
use QDenka\EasyValidation\Domain\Email\DisposableEmailValidator;
use QDenka\EasyValidation\Domain\Date\DateValidator;
use QDenka\EasyValidation\Domain\Number\NumberValidator;
use QDenka\EasyValidation\Domain\Url\UrlValidator;
use QDenka\EasyValidation\Infrastructure\Email\FileDisposableEmailDomainProvider;

class ValidatorFactory implements ValidatorFactoryInterface
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

    public static function create(string $type): ?ValidatorInterface
    {
        $type = strtolower($type);

        if (!array_key_exists($type, self::VALIDATOR_MAP)) {
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

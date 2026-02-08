<?php

namespace QDenka\EasyValidation\Application\Validators;

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
    public static function create(string $type): ?ValidatorInterface
    {
        switch (strtolower($type)) {
            case 'email':
                return new EmailValidator();
            case 'google_email':
                return new GoogleMailValidator();
            case 'disposable_email':
                $provider = new FileDisposableEmailDomainProvider(__DIR__ . '/../../../config/disposable_domains.php');
                return new DisposableEmailValidator($provider);
            case 'date':
                return new DateValidator();
            case 'number':
                return new NumberValidator();
            case 'url':
                return new UrlValidator();
            case 'ip':
                return new IpValidator();
            case 'uuid':
                return new UuidValidator();
            case 'json':
                return new JsonValidator();
            case 'base64':
                return new Base64Validator();
            case 'phone':
                return new PhoneNumberValidator();
            default:
                return null;
        }
    }
}

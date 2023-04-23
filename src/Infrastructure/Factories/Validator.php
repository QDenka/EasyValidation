<?php

namespace QDenka\EasyValidation\Infrastructure\Factories;

use QDenka\EasyValidation\Application\Validators\ValidatorFactoryInterface;
use QDenka\EasyValidation\Application\Validators\ValidatorInterface;
use QDenka\EasyValidation\Domain\Date\DateValidator;
use QDenka\EasyValidation\Domain\Email\EmailValidator;
use QDenka\EasyValidation\Domain\Number\NumberValidator;
use QDenka\EasyValidation\Domain\Url\UrlValidator;

/**
 * Class Validator
 *
 * @package QDenka\EasyValidation\Infrastructure
 */
class Validator implements ValidatorFactoryInterface
{
    private const VALIDATOR_MAP = [
        'email' => EmailValidator::class,
        'url' => UrlValidator::class,
        'number' => NumberValidator::class,
        'date' => DateValidator::class,
    ];

    /**
     * @param string $value
     * @return bool
     */
    public static function isValidEmail(string $value): bool
    {
        return self::validate('email', $value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function isValidUrl(string $value): bool
    {
        return self::validate('url', $value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function isValidNumber(string $value): bool
    {
        return self::validate('number', $value);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function isValidDate(string $value): bool
    {
        return self::validate('date', $value);
    }

    /**
     * @param string $type
     * @param string $value
     * @return bool
     */
    public static function validate(string $type, string $value): bool
    {
        $validator = self::create($type);

        if ($validator === null) {
            return false;
        }

        return $validator->validate($value);
    }

    /**
     * Create a validator instance by type
     *
     * @param string $type
     * @return ValidatorInterface|null
     */
    public static function create(string $type): ?ValidatorInterface
    {
        if (!array_key_exists($type, self::VALIDATOR_MAP)) {
            return null;
        }

        $validatorClass = self::VALIDATOR_MAP[$type];

        return new $validatorClass();
    }
}
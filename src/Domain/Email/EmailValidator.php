<?php

namespace QDenka\EasyValidation\Domain\Email;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Class EmailValidator
 *
 * @package QDenka\EasyValidation\Domain\Email
 */
class EmailValidator implements ValidatorInterface
{
    /**
     * Validate the given email value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}

<?php

namespace QDenka\EasyValidation\Domain\Email;

use QDenka\EasyValidation\Application\Validators\ValidatorInterface;

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
     * @param mixed $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}

<?php

namespace QDenka\EasyValidation\Domain\Number;

use QDenka\EasyValidation\Application\Validators\ValidatorInterface;

/**
 * Class NumberValidator
 *
 * @package QDenka\EasyValidation\Domain\Number
 */
class NumberValidator implements ValidatorInterface
{
    /**
     * Validate the given number value
     *
     * @param mixed $value
     * @return bool
     */
    public function validate(mixed $value): bool
    {
        return is_numeric($value);
    }
}

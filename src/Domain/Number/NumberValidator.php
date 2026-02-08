<?php

namespace QDenka\EasyValidation\Domain\Number;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

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
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        return is_numeric($value);
    }
}

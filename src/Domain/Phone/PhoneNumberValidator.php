<?php

namespace QDenka\EasyValidation\Domain\Phone;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Basic international phone number check (E.164).
 */
class PhoneNumberValidator implements ValidatorInterface
{
    /**
     * Validate the given phone number value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        return (bool) preg_match('/^\+[1-9]\d{7,14}$/', $value);
    }
}

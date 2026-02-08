<?php

namespace QDenka\EasyValidation\Domain\Json;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Checks if a string is valid JSON.
 */
class JsonValidator implements ValidatorInterface
{
    /**
     * Validate the given JSON value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }
}

<?php

namespace QDenka\EasyValidation\Domain\Uuid;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Validates UUID v1–v5.
 */
class UuidValidator implements ValidatorInterface
{
    /**
     * Validate the given UUID value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        return (bool) preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $value
        );
    }
}

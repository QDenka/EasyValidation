<?php

namespace QDenka\EasyValidation\Domain\Base64;

use QDenka\EasyValidation\Application\Validators\ValidatorInterface;

/**
 * Validates Base64-encoded strings.
 */
class Base64Validator implements ValidatorInterface
{
    /**
     * Validate the given Base64 value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        if (strlen($value) % 4 !== 0) {
            return false;
        }
        if (!preg_match('/^[A-Za-z0-9+\/]+={0,2}$/', $value)) {
            return false;
        }
        $decoded = base64_decode($value, true);
        
        return $decoded !== false && base64_encode($decoded) === $value;
    }
}

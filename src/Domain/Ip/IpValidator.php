<?php

namespace QDenka\EasyValidation\Domain\Ip;

use QDenka\EasyValidation\Application\Validators\ValidatorInterface;

/**
 * Validates IPv4 and IPv6 addresses.
 */
class IpValidator implements ValidatorInterface
{
    /**
     * Validate the given IP address value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }
}

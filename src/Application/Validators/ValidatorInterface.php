<?php

namespace QDenka\EasyValidation\Application\Validators;

/**
 * Interface ValidatorInterface
 *
 * @package QDenka\EasyValidation\Application\Validators
 */
interface ValidatorInterface
{
    /**
     * Validate the given value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool;
}

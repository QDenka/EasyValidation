<?php

namespace QDenka\EasyValidation\Domain\Contracts;

/**
 * Interface ValidatorInterface
 *
 * Core domain contract that all validators must implement.
 *
 * @package QDenka\EasyValidation\Domain\Contracts
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

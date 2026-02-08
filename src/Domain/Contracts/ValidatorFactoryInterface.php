<?php

namespace QDenka\EasyValidation\Domain\Contracts;

/**
 * Interface ValidatorFactoryInterface
 *
 * Contract for creating validator instances by type key.
 *
 * @package QDenka\EasyValidation\Domain\Contracts
 */
interface ValidatorFactoryInterface
{
    /**
     * Create a validator by type key.
     *
     * @param string $type
     * @return ValidatorInterface|null
     */
    public static function create(string $type): ?ValidatorInterface;
}

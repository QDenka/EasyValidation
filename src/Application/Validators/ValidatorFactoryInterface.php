<?php

namespace QDenka\EasyValidation\Application\Validators;

/**
 * Factory for creating validators by type.
 */
interface ValidatorFactoryInterface
{
    /**
     * Create a validator instance by its type key.
     *
     * @param string $type
     * @return ValidatorInterface|null
     */
    public static function create(string $type): ?ValidatorInterface;
}

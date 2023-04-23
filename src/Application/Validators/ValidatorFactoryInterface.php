<?php

namespace QDenka\EasyValidation\Application\Validators;

interface ValidatorFactoryInterface
{
    public static function create(string $type): ?ValidatorInterface;
}
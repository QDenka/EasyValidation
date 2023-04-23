<?php

namespace QDenka\EasyValidation\Domain\Url;

use QDenka\EasyValidation\Application\Validators\ValidatorInterface;

/**
 * Class UrlValidator
 *
 * @package QDenka\EasyValidation\Domain\Url
 */
class UrlValidator implements ValidatorInterface
{
    /**
     * Validate the given URL value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }
}

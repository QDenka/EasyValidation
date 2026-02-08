<?php

namespace QDenka\EasyValidation\Domain\Url;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Class UrlValidator
 *
 * Validates HTTP and HTTPS URLs only.
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
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }

        $scheme = parse_url($value, PHP_URL_SCHEME);

        return in_array(strtolower($scheme ?? ''), ['http', 'https'], true);
    }
}

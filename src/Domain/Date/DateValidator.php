<?php
namespace QDenka\EasyValidation\Domain\Date;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Validates dates in a given format (default YYYY-MM-DD).
 */
class DateValidator implements ValidatorInterface
{
    private string $format = 'Y-m-d';

    public function __construct(?string $format = null)
    {
        if ($format) {
            $this->format = $format;
        }
    }

    /**
     * Validate the given date value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        $dt = \DateTime::createFromFormat($this->format, $value);
        return $dt && $dt->format($this->format) === $value;
    }
}

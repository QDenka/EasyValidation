<?php

namespace QDenka\EasyValidation\Domain\Date;

use QDenka\EasyValidation\Application\Validators\ValidatorInterface;

/**
 * Class DateValidator
 *
 * @package QDenka\EasyValidation\Domain\Date
 */
class DateValidator implements ValidatorInterface
{
    /**
     * The date format
     *
     * @var string
     */
    private string $format = 'Y-m-d';

    /**
     * Validate the given date value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        $dateTime = \DateTime::createFromFormat($this->format, $value);

        return $dateTime && $dateTime->format($this->format) === $value;
    }

    /**
     * @param string $format
     * @return void
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }
}

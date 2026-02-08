<?php
namespace QDenka\EasyValidation\Domain\Email;

use QDenka\EasyValidation\Domain\Contracts\ValidatorInterface;

/**
 * Checks that email is valid *and* uses Gmail or Googlemail domain.
 */
class GoogleMailValidator implements ValidatorInterface
{
    private EmailValidator $emailValidator;

    private array $allowedDomains = ['gmail.com', 'googlemail.com'];

    public function __construct()
    {
        $this->emailValidator = new EmailValidator();
    }

    /**
     * Validate the given email value
     *
     * @param string $value
     * @return bool
     */
    public function validate(string $value): bool
    {
        if (! $this->emailValidator->validate($value)) {
            return false;
        }
        [, $domain] = explode('@', $value, 2);

        return in_array(strtolower($domain), $this->allowedDomains, true);
    }
}

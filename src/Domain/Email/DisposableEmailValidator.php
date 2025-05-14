<?php

namespace QDenka\EasyValidation\Domain\Email;

use QDenka\EasyValidation\Application\Validators\ValidatorInterface;
use QDenka\EasyValidation\Domain\Email\Provider\DisposableEmailDomainProviderInterface;

/**
 * Rejects emails whose domain is in a disposable-mail blacklist.
 */
class DisposableEmailValidator implements ValidatorInterface
{
    private EmailValidator $emailValidator;
    private DisposableEmailDomainProviderInterface $domainProvider;

    public function __construct(DisposableEmailDomainProviderInterface $provider)
    {
        $this->emailValidator  = new EmailValidator();
        $this->domainProvider = $provider;
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
        return ! in_array(strtolower($domain), $this->domainProvider->getDisposableDomains(), true);
    }
}

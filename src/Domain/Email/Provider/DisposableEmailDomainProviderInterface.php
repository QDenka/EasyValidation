<?php

namespace QDenka\EasyValidation\Domain\Email\Provider;

/**
 * Supplies a list of disposable email domains.
 */
interface DisposableEmailDomainProviderInterface
{
    /**
     * @return string[] list of lowercased domains
     */
    public function getDisposableDomains(): array;
}

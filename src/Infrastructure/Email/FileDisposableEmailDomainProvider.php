<?php

namespace QDenka\EasyValidation\Infrastructure\Email;

use QDenka\EasyValidation\Domain\Email\Provider\DisposableEmailDomainProviderInterface;

/**
 * Reads disposable domains from a PHP file returning an array.
 */
class FileDisposableEmailDomainProvider implements DisposableEmailDomainProviderInterface
{
    private array $domains;

    public function __construct(string $pathToConfig)
    {
        $this->domains = file_exists($pathToConfig)
            ? array_map('strtolower', require $pathToConfig)
            : [];
    }

    /**
     * Get the list of disposable domains
     *
     * @return string[]
     */
    public function getDisposableDomains(): array
    {
        return $this->domains;
    }
}

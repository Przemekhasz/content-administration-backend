<?php

namespace App\Infrastructure\Service\Footer;

use App\Domain\Footer\Dto\Footer;
use App\Infrastructure\Storage\Footer\Interface\FooterStorageInterface;

class FooterService
{
    public function __construct(
        private readonly FooterStorageInterface $footerStorage,
    ) {
    }

    public function findFooter(): Footer
    {
        return $this->footerStorage->findFooter();
    }
}

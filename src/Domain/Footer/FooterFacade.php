<?php

namespace App\Domain\Footer;

use App\Domain\Footer\Dto\Footer;
use App\Infrastructure\Service\Footer\FooterService;

class FooterFacade
{
    public function __construct(
        private readonly FooterService $footerService,
    ) {
    }

    public function findFooter(): Footer
    {
        return $this->footerService->findFooter();
    }
}

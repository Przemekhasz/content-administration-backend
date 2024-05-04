<?php

namespace App\Application\Footer;

use App\Domain\Footer\Dto\Footer;
use App\Domain\Footer\FooterFacade;

class FooterAdapter
{
    public function __construct(
        private readonly FooterFacade $footerFacade,
    ) {
    }

    public function findFooter(): Footer
    {
        return $this->footerFacade->findFooter();
    }
}

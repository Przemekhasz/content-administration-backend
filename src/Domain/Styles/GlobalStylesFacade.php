<?php

namespace App\Domain\Styles;

use App\Domain\Styles\Dto\GlobalStyles;
use App\Infrastructure\Service\Styles\GlobalStylesService;

class GlobalStylesFacade
{
    public function __construct(
        private readonly GlobalStylesService $globalStylesService,
    ) {
    }

    public function findGlobalStyles(): GlobalStyles
    {
        return $this->globalStylesService->findGlobalStyles();
    }
}

<?php

namespace App\Application\Styles;

use App\Domain\Styles\Dto\GlobalStyles;
use App\Domain\Styles\GlobalStylesFacade;

class GlobalStylesAdapter
{
    public function __construct(
        private readonly GlobalStylesFacade $globalStylesFacade,
    ) {
    }

    public function findGlobalStyles(): GlobalStyles
    {
        return $this->globalStylesFacade->findGlobalStyles();
    }
}

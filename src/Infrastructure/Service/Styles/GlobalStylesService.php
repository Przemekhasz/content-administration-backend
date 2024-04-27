<?php

namespace App\Infrastructure\Service\Styles;

use App\Domain\Styles\Dto\GlobalStyles;
use App\Infrastructure\Storage\Styles\Interface\GlobalStylesStorageInterface;

class GlobalStylesService
{
    public function __construct(
        private readonly GlobalStylesStorageInterface $globalStylesStorage,
    ) {
    }

    public function findGlobalStyles(): GlobalStyles
    {
        return $this->globalStylesStorage->findGlobalStyles();
    }
}

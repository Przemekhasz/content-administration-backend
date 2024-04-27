<?php

namespace App\Infrastructure\Storage\Styles\Interface;

use App\Domain\Styles\Dto\GlobalStyles;

interface GlobalStylesStorageInterface
{
    public function findGlobalStyles(): GlobalStyles;
}

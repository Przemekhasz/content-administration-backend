<?php

namespace App\Infrastructure\Storage\Styles;

use App\Domain\Styles\Dto\GlobalStyles;
use App\Infrastructure\Exception\Styles\GlobalStylesNotFoundException;
use App\Infrastructure\Factory\Page\GlobalStylesFactory;
use App\Infrastructure\Repository\Styles\GlobalStylesRepository;
use App\Infrastructure\Storage\Styles\Interface\GlobalStylesStorageInterface;
use Doctrine\ORM\NonUniqueResultException;

class GlobalStylesStorage implements GlobalStylesStorageInterface
{
    public function __construct(
        private readonly GlobalStylesRepository $globalStylesRepository,
        private readonly GlobalStylesFactory $globalStylesFactory,
    ) {
    }

    /**
     * @throws NonUniqueResultException
     * @throws GlobalStylesNotFoundException
     */
    public function findGlobalStyles(): GlobalStyles
    {
        $globalStyles = $this->globalStylesRepository->findLastGlobalStyles();

        return $this->globalStylesFactory->createFromEntity($globalStyles);
    }
}

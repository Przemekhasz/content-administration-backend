<?php

namespace App\Infrastructure\Storage\Footer;

use App\Domain\Footer\Dto\Footer;
use App\Infrastructure\Exception\Styles\GlobalStylesNotFoundException;
use App\Infrastructure\Factory\Footer\FooterFactory;
use App\Infrastructure\Repository\Footer\FooterRepository;
use App\Infrastructure\Storage\Footer\Interface\FooterStorageInterface;

class FooterStorage implements FooterStorageInterface
{
    public function __construct(
        private readonly FooterRepository $footerRepository,
        private readonly FooterFactory $footerFactory,
    ) {
    }

    /**
     * @throws GlobalStylesNotFoundException
     */
    public function findFooter(): Footer
    {
        $footer = $this->footerRepository->findFooter();

        return $this->footerFactory->createFromEntity($footer);
    }
}

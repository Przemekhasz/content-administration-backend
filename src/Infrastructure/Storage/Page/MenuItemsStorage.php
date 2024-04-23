<?php

namespace App\Infrastructure\Storage\Page;

use App\Infrastructure\Factory\Page\MenuItemsFactory;
use App\Infrastructure\Repository\Page\MenuItemRepository;
use App\Infrastructure\Storage\Page\Interface\MenuItemsStorageInterface;

class MenuItemsStorage implements MenuItemsStorageInterface
{
    public function __construct(
        private readonly MenuItemRepository $menuItemRepository,
        private readonly MenuItemsFactory $menuItemsFactory,
    ) {
    }


    public function findAll(): \Generator
    {
        $entities = $this->menuItemRepository->findAll();

        return $this->getGenerator($entities);
    }

    private function getGenerator(array $entities): \Generator {
        foreach ($entities as $entity) {
            yield $this->menuItemsFactory->createFromEntity($entity);
        }
    }
}

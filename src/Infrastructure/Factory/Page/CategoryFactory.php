<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Category;
use App\Infrastructure\Entity\Page\Category as CategoryEntity;

class CategoryFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(CategoryEntity $entity): Category
    {
        return new Category(
            id: $entity->getId(),
            name: $entity->getName()
        );
    }
}

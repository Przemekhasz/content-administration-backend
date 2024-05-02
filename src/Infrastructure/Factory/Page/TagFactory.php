<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Tag;
use App\Infrastructure\Entity\Page\Tag as TagEntity;

class TagFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(TagEntity $entity): Tag
    {
        return new Tag(
            id: $entity->getId(),
            name: $entity->getName()
        );
    }
}

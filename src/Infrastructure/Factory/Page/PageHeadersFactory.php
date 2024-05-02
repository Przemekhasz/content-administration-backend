<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\PageHeader;
use App\Infrastructure\Entity\Page\PageHeader as PageHeaderEntity;

class PageHeadersFactory
{
    public function __construct()
    {
    }

    public function createFromEntity(PageHeaderEntity $entity): PageHeader
    {
        return new PageHeader(
            id: $entity->getId(),
            name: $entity->getName(),
            isMain: $entity->isMain()
        );
    }
}

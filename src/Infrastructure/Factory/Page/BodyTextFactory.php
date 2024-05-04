<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\BodyText;
use App\Infrastructure\Entity\Page\BodyText as BodyTextEntity;

class BodyTextFactory
{
    public function createFromEntity(BodyTextEntity $entity): BodyText
    {
        return new BodyText(
            id: $entity->getId(),
            heading: $entity->getHeading(),
            body: $entity->getBody(),
        );
    }
}

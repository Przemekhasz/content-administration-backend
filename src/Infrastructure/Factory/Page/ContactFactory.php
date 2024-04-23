<?php

namespace App\Infrastructure\Factory\Page;

use App\Domain\Page\Dto\Contact;
use App\Infrastructure\Entity\Page\Contact as ContactEntity;

class ContactFactory
{
    public function createDto(ContactEntity $entity): Contact
    {
        return new Contact(
            id: $entity->getId(),
            email: $entity->getEmail(),
            topic: $entity->getTopic(),
            content: $entity->getContent(),
            replyMsg: $entity->getReplyMsg(),
            isAnswered: $entity->isAnswered(),
            createdAt: $entity->getCreatedAt(),
            updatedAt: $entity->getUpdatedAt(),
        );
    }
}

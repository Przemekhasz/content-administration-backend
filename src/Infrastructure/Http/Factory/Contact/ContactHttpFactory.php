<?php

namespace App\Infrastructure\Http\Factory\Contact;

use App\Domain\Contact\Dto\Contact;
use App\Infrastructure\Http\Dto\Contact\HttpContact;

class ContactHttpFactory
{
    public function createDto(HttpContact $http): Contact
    {
        return new Contact(
            id: $http->getId(),
            email: $http->getEmail(),
            topic: $http->getTopic(),
            content: $http->getContent(),
            replyMsg: $http->getReplyMsg(),
            isAnswered: $http->isAnswered(),
            createdAt: $http->getCreatedAt(),
            updatedAt: $http->getUpdatedAt(),
        );
    }

    public function createHttpObject(Contact $contact): HttpContact
    {
        return new HttpContact(
            id: $contact->getId(),
            email: $contact->getEmail(),
            topic: $contact->getTopic(),
            content: $contact->getContent(),
            replyMsg: $contact->getReplyMsg(),
            isAnswered: $contact->isAnswered(),
            createdAt: $contact->getCreatedAt(),
            updatedAt: $contact->getUpdatedAt(),
        );
    }
}

<?php

namespace App\Infrastructure\Storage\Page;

use App\Domain\Page\Dto\Contact;
use App\Infrastructure\Entity\Page\Contact as ContactEntity;
use App\Infrastructure\Factory\Page\ContactFactory;
use App\Infrastructure\Http\Dto\Page\HttpContact;
use App\Infrastructure\Repository\Page\ContactRepository;
use App\Infrastructure\Storage\Page\Interface\ContactStorageInterface;

class ContactStorage implements ContactStorageInterface
{
    public function __construct(
        private readonly ContactRepository $contactRepository,
        private readonly ContactFactory $contactFactory,
    ) {
    }


    public function contact(Contact $contact): Contact
    {
        $contactEntity = new ContactEntity(
          email: $contact->getEmail(),
          topic: $contact->getTopic(),
          content: $contact->getContent(),
          replyMsg: $contact->getReplyMsg(),
          isAnswered: $contact->isAnswered(),
        );

        $this->contactRepository->persist($contactEntity);
        return $this->contactFactory->createDto($contactEntity);
    }
}

<?php

namespace App\Infrastructure\Service\Contact;

use App\Domain\Contact\Dto\Contact;
use App\Infrastructure\Storage\Contact\Interface\ContactStorageInterface;

class ContactService
{
    public function __construct(
        private readonly ContactStorageInterface $contactStorage,
    ) {
    }

    public function contact(Contact $contact): Contact {
        return $this->contactStorage->contact($contact);
    }
}

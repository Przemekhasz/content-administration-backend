<?php

namespace App\Infrastructure\Service\Page;

use App\Domain\Page\Dto\Contact;
use App\Domain\Page\Dto\Page;
use App\Infrastructure\Http\Dto\Page\HttpContact;
use App\Infrastructure\Storage\Page\Interface\ContactStorageInterface;
use App\Infrastructure\Storage\Page\Interface\PageStorageInterface;

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

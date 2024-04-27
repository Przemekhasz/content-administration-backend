<?php

namespace App\Domain\Contact;

use App\Domain\Contact\Dto\Contact;
use App\Infrastructure\Service\Contact\ContactService;

class ContactFacade
{
    public function __construct(
        private readonly ContactService $contactService,
    ) {
    }

    public function contact(Contact $contact): Contact
    {
        return $this->contactService->contact($contact);
    }
}

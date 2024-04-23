<?php

namespace App\Domain\Page;

use App\Domain\Page\Dto\Contact;
use App\Domain\Page\Dto\Page;
use App\Infrastructure\Http\Dto\Page\HttpContact;
use App\Infrastructure\Service\Page\ContactService;
use App\Infrastructure\Service\Page\PageService;

class ContactFacade
{
    public function __construct(
        private readonly ContactService $contactService,
    ) {
    }

    public function contact(Contact $contact): Contact {
        return $this->contactService->contact($contact);
    }
}

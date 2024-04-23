<?php

namespace App\Application\Page;

use App\Domain\Page\ContactFacade;
use App\Domain\Page\Dto\Contact;
use App\Infrastructure\Http\Dto\Page\HttpContact;
use App\Infrastructure\Http\Factory\Page\ContactHttpFactory;

class ContactAdapter
{
    public function __construct(
        private readonly ContactHttpFactory $contactHttpFactory,
        private readonly ContactFacade $contactFacade,
    ) {
    }

    public function contact(HttpContact $httpContact): HttpContact
    {
        $contact = $this->contactHttpFactory->createDto($httpContact);
        $contact = $this->contactFacade->contact($contact);

        return $this->contactHttpFactory->createHttpObject($contact);
    }
}

<?php

namespace App\Application\Contact;

use App\Domain\Contact\ContactFacade;
use App\Infrastructure\Http\Dto\Contact\HttpContact;
use App\Infrastructure\Http\Factory\Contact\ContactHttpFactory;

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

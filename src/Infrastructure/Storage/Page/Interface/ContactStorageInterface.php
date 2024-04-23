<?php

namespace App\Infrastructure\Storage\Page\Interface;

use App\Domain\Page\Dto\Contact;
use App\Domain\Page\Dto\Page;
use App\Infrastructure\Http\Dto\Page\HttpContact;

interface ContactStorageInterface
{
    public function contact(Contact $contact): Contact;
}

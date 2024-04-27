<?php

namespace App\Infrastructure\Storage\Contact\Interface;

use App\Domain\Contact\Dto\Contact;

interface ContactStorageInterface
{
    public function contact(Contact $contact): Contact;
}

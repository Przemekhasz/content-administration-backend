<?php

namespace App\Infrastructure\Storage\Footer\Interface;

use App\Domain\Footer\Dto\Footer;

interface FooterStorageInterface
{
    public function findFooter(): Footer;
}

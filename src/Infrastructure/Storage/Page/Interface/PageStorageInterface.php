<?php

namespace App\Infrastructure\Storage\Page\Interface;

use App\Domain\Page\Dto\Page;

interface PageStorageInterface
{
    public function findById(string $id): Page;
}

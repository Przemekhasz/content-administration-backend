<?php

namespace App\Infrastructure\Storage\Page\Interface;

use App\Domain\Page\Dto\Page;
interface PageStorageInterface
{
    public function findById(string $id): Page;
    public function findGalleryByPageId(string $id): Page;
    public function findProjectsByPageId(string $id): Page;
}

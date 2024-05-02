<?php

namespace App\Infrastructure\Storage\Page\Interface;

use App\Domain\Page\Dto\Page;
use App\Domain\Styles\Dto\Styles;

interface PageStorageInterface
{
    public function findById(string $id): Page;

    public function findAll(): \Generator;

    public function findGalleryByPageId(string $id): Page;

    public function findProjectsByPageId(string $id): Page;

    public function findStylesByPageId(string $id): ?Styles;
}

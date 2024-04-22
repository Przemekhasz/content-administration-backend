<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Page\Image;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class ImageRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Image::class);
    }
}

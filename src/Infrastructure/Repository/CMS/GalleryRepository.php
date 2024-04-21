<?php

namespace App\Infrastructure\Repository\CMS;

use App\Infrastructure\Entity\CMS\Gallery;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class GalleryRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Gallery::class);
    }
}

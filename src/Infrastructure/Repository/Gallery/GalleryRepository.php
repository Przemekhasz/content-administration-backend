<?php

namespace App\Infrastructure\Repository\Gallery;

use App\Infrastructure\Entity\Gallery\Gallery;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class GalleryRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Gallery::class);
    }

    public function findById(string $id): ?Gallery
    {
        $qb = $this->createQueryBuilder('g')
            ->where('g.id = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult();
    }
}

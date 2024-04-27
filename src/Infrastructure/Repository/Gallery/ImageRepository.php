<?php

namespace App\Infrastructure\Repository\Gallery;

use App\Infrastructure\Entity\Gallery\Image;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class ImageRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Image::class);
    }

    public function findByGalleryId(string $id): ?array
    {
        $qb = $this->createQueryBuilder('i')
            ->where('i.gallery = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }

    public function countImages(): int
    {
        return $this->createQueryBuilder('i')
            ->select('count(i.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}

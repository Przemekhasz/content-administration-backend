<?php

namespace App\Infrastructure\Repository\Gallery;

use App\Infrastructure\Entity\Gallery\Gallery;
use App\Infrastructure\Exception\Gallery\GalleryNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NoResultException;

class GalleryRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Gallery::class);
    }

    /**
     * @throws GalleryNotFoundException
     */
    public function findById(string $id): ?Gallery
    {
        try {
            return $this->createQueryBuilder('g')
                ->where('g.id = :id')
                ->setParameter('id', $id)
                ->setMaxResults(1)
                ->getQuery()
                ->getResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new GalleryNotFoundException();
        }
    }
}

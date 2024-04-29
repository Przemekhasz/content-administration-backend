<?php

namespace App\Infrastructure\Repository\Gallery;

use App\Infrastructure\Entity\Gallery\Image;
use App\Infrastructure\Exception\Gallery\GalleryImageNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class ImageRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Image::class);
    }

    /**
     * @throws GalleryImageNotFoundException
     */
    public function findByGalleryId(string $id): ?array
    {
        try {
            return $this->createQueryBuilder('i')
                ->where('i.gallery = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new GalleryImageNotFoundException();
        }
    }

    /**
     * @throws NonUniqueResultException
     * @throws GalleryImageNotFoundException
     */
    public function countImages(): int
    {
        try {
            return $this->createQueryBuilder('i')
                ->select('count(i.id)')
                ->getQuery()
                ->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new GalleryImageNotFoundException();
        }
    }
}

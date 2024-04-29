<?php

namespace App\Infrastructure\Repository\Project;

use App\Infrastructure\Entity\Project\Project;
use App\Infrastructure\Exception\Project\ProjectNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class ProjectRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Project::class);
    }

    /**
     * @throws ProjectNotFoundException
     */
    public function findById(string $id): ?Project
    {
        try {
            return $this->createQueryBuilder('p')
                ->where('p.id = :id')
                ->setParameter('id', $id)
                ->setMaxResults(1)
                ->getQuery()
                ->getResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new ProjectNotFoundException();
        }
    }

    /**
     * @throws NonUniqueResultException
     * @throws ProjectNotFoundException
     */
    public function countProjects(): int
    {
        try {
            return $this->createQueryBuilder('p')
                ->select('count(p.id)')
                ->getQuery()
                ->getSingleScalarResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new ProjectNotFoundException();
        }
    }
}

<?php

namespace App\Infrastructure\Repository\Project;

use App\Infrastructure\Entity\Project\ProjectDetail;
use App\Infrastructure\Exception\Project\ProjectDetailsNotFoundException;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NoResultException;

class ProjectDetailRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, ProjectDetail::class);
    }

    /**
     * @throws ProjectDetailsNotFoundException
     */
    public function findByProjectId(string $id): ?array
    {
        try {
            return $this->createQueryBuilder('pd')
                ->where('pd.project = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new ProjectDetailsNotFoundException();
        }
    }
}

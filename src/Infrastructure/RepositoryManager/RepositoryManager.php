<?php

namespace App\Infrastructure\RepositoryManager;

use App\Infrastructure\RepositoryManager\Filter\Filter;
use App\Infrastructure\RepositoryManager\InfiniteScroll\InfiniteScroll;
use App\Infrastructure\RepositoryManager\Interface\CommandRepositoryInterface;
use App\Infrastructure\RepositoryManager\Interface\EntityInterface;
use App\Infrastructure\RepositoryManager\Interface\QueryRepositoryInterface;
use App\Infrastructure\RepositoryManager\Paginator\Interface\PaginationManagerInterface;
use App\Infrastructure\RepositoryManager\Paginator\PaginationManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;

abstract class RepositoryManager extends EntityRepository implements CommandRepositoryInterface, QueryRepositoryInterface
{
    protected readonly Filter $filter;
    private readonly PaginationManagerInterface $paginator;
    private readonly ClassMetadata $metadata;
    public function __construct(EntityManagerInterface $em, ClassMetadata $metadata)
    {
        parent::__construct($em, $metadata);
        $this->paginator = new PaginationManager();
        $this->filter = new Filter();
        $this->metadata = $metadata;
    }

    public function getName(): string
    {
        return $this->metadata->getName();
    }

    public function select(string $qbName): QueryBuilder
    {
        return $this->createQueryBuilder($qbName);
    }

    public function persist(EntityInterface $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function update(EntityInterface $entity)
    {
        $this->getEntityManager()->flush();
    }

    public function remove(EntityInterface $entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @return Filter
     */
    public function getFilter(): Filter
    {
        return $this->filter;
    }

    /**
     * @return PaginationManagerInterface
     */
    public function getPaginator(): PaginationManagerInterface
    {
        return $this->paginator;
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return parent::getEntityManager();
    }
}

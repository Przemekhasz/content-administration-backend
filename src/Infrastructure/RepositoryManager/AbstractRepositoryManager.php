<?php

namespace App\Infrastructure\RepositoryManager;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;

class AbstractRepositoryManager extends RepositoryManager
{
    public function __construct(EntityManagerInterface $em, string $entity)
    {
        parent::__construct($em, new ClassMetadata($entity));
    }
}

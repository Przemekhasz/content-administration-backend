<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\User\User;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use App\Infrastructure\RepositoryManager\Interface\CommandRepositoryInterface;
use App\Infrastructure\RepositoryManager\Interface\QueryRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository extends AbstractRepositoryManager implements QueryRepositoryInterface, CommandRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, User::class);
    }

    public function getName(): string
    {
        return self::class;
    }
}

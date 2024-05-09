<?php

namespace App\Infrastructure\Repository\User;

use App\Infrastructure\Entity\User\User;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use App\Infrastructure\RepositoryManager\Interface\CommandRepositoryInterface;
use App\Infrastructure\RepositoryManager\Interface\QueryRepositoryInterface;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NoResultException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

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

    public function findById(int $id): User
    {
        try {
            return $this->select('user')
                ->andWhere('user.id = :id')
                ->setParameter('id', $id)
                ->getQuery()->getSingleResult(AbstractQuery::HYDRATE_OBJECT);
        } catch (NoResultException) {
            throw new UserNotFoundException();
        } catch (\Exception $exception) {
            throw new \Exception($exception);
        }
    }
}

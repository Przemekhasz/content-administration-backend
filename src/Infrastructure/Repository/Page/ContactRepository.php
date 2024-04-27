<?php

namespace App\Infrastructure\Repository\Page;

use App\Infrastructure\Entity\Contact\Contact;
use App\Infrastructure\RepositoryManager\AbstractRepositoryManager;
use Doctrine\ORM\EntityManagerInterface;

class ContactRepository extends AbstractRepositoryManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Contact::class);
    }

    /**
     * Count the number of unanswered contacts.
     */
    public function countUnansweredContacts(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id)')
            ->where('c.isAnswered = :answered')
            ->setParameter('answered', false)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countAnsweredContacts(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id)')
            ->where('c.isAnswered = :answered')
            ->setParameter('answered', true)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countContacts(): int
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}

<?php

namespace App\Infrastructure\Repository\CMS;

use App\Infrastructure\Entity\CMS\Contact;
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
     *
     * @return int
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
}

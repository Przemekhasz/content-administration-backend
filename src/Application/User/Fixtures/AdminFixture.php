<?php

namespace App\Application\User\Fixtures;

use App\Domain\User\Enum\UserRoles;
use App\Infrastructure\Entity\User\User;
use App\Infrastructure\Repository\User\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

class AdminFixture extends Fixture
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager): void
    {
        $user = new User();

        $user->setUserName('admin');
        $user->setPassword(password_hash('admin1234', PASSWORD_DEFAULT));
        $user->setRoles([UserRoles::ROLE_ADMIN]);
        $user->setCreatedAt();


        $this->userRepository->persist($user);

        $this->logger->debug(sprintf('Successfully created %s account', $user->getId()));
    }
}

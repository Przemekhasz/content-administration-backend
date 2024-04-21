<?php

declare(strict_types=1);

namespace App\Infrastructure\Entity\User;

use App\Infrastructure\Repository\User\UserRepository;
use App\Infrastructure\RepositoryManager\Interface\EntityInterface;
use App\Infrastructure\Traits\CreatedAtTrait;
use App\Infrastructure\Traits\UpdatedAtTrait;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Table(name: '`user`')]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface, EntityInterface
{
    use UUIDTrait;

    use UpdatedAtTrait;
    use CreatedAtTrait;
    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $username = '';
    #[ORM\Column(type: 'string')]
    private string $password = '';
    #[ORM\Column(type: 'array')]
    private array $roles = [];

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles(array $roles): User
    {
        $this->roles = $roles;
        return $this;
    }

    public function addRole(string $role): self
    {
        $this->roles[] = $role;
        return $this;
    }
    public function hasRole(string $role): bool
    {
        return isset($this->roles[$role]);
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function __toString()
    {
        return sprintf('[%d] %s', $this->id, $this->username);
    }

}

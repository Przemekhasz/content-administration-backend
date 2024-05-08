<?php

namespace App\Infrastructure\Entity\Contact;

use App\Infrastructure\Repository\Page\ContactRepository;
use App\Infrastructure\Traits\CreatedAtTrait;
use App\Infrastructure\Traits\UpdatedAtTrait;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('contact')]
#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    use UUIDTrait;
    use CreatedAtTrait;
    use UpdatedAtTrait;

    public function __construct(
        #[ORM\Column]
        private string $email = '',
        #[ORM\Column]
        private string $topic = '',
        #[ORM\Column(type: 'text')]
        private string $content = '',
        #[ORM\Column(nullable: true)]
        private ?string $replyMsg = '',
        #[ORM\Column]
        private bool $isAnswered = false,
    ) {
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTopic(): string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): void
    {
        $this->topic = $topic;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getReplyMsg(): ?string
    {
        return $this->replyMsg;
    }

    public function setReplyMsg(?string $replyMsg): void
    {
        $this->replyMsg = $replyMsg;
    }

    public function isAnswered(): bool
    {
        return $this->isAnswered;
    }

    public function setIsAnswered(bool $isAnswered): void
    {
        $this->isAnswered = $isAnswered;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}

<?php

namespace App\Infrastructure\Http\Dto\Page;

use OpenApi\Attributes as OA;

class HttpContact
{
    public function __construct(
        #[OA\Property(description: 'The unique identifier of the user.', example: 0)]
        private ?string $id = null,
        #[OA\Property(description: 'From email', example: 'user@example.com')]
        private ?string $email = null,
        #[OA\Property(description: 'Contact topic', example: 'topic')]
        private ?string $topic = null,
        #[OA\Property(description: 'Content', example: 'Contact content')]
        private ?string $content = null,
        #[OA\Property(description: 'Reply message', example: 'This is reply message')]
        private ?string $replyMsg = null,
        #[OA\Property(description: 'is answered', example: false)]
        private bool $isAnswered = false,
        #[OA\Property(description: 'Created At', example: 'user@example.com')]
        private ?string $createdAt = null,
        #[OA\Property(description: 'Updated At', example: 'user@example.com')]
        private ?string $updatedAt = null,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(?string $topic): void
    {
        $this->topic = $topic;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
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

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}

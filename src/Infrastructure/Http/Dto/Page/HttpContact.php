<?php

namespace App\Infrastructure\Http\Dto\Page;

use OpenApi\Attributes as OA;

class HttpContact
{
    public function __construct(
        #[OA\Property]
        private ?string    $id = null,
        #[OA\Property]
        private ?string $email = null,
        #[OA\Property]
        private ?string $topic = null,
        #[OA\Property]
        private ?string $content = null,
        #[OA\Property]
        private ?string $replyMsg = null,
        #[OA\Property]
        private bool $isAnswered = false,
        #[OA\Property]
        private ?string $createdAt = null,
        #[OA\Property]
        private ?string $updatedAt = null,
    ) {}

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

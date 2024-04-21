<?php

namespace App\Infrastructure\Traits;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\GeneratedValue;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Symfony\Component\Serializer\Annotation\Groups;

trait CreatedAtTrait
{
    #[Groups('default')]
    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    protected ?DateTimeInterface $createdAt;

    /**
     * Set createdAt
     * @ORM\PrePersist
     */
    public function setCreatedAt(): void
    {
        $this->createdAt  = new DateTime();

        if (property_exists($this, 'updatedAt')) {
            $this->updatedAt  = new DateTime();
        }
    }

    /**
     * GetRecordingDateFromFileName createdAt
     * @return ?DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface|string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }
}

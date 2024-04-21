<?php

namespace App\Infrastructure\Traits;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\GeneratedValue;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Symfony\Component\Serializer\Annotation\Groups;

trait UpdatedAtTrait
{
    #[Column(type: 'datetime', nullable: false, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private DateTimeInterface $updatedAt;

    /**
     * Set updatedAt
     */
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }

    /**
     * GetRecordingDateFromFileName updatedAt
     *
     * @return DateTimeInterface|string
     */
    public function getUpdatedAt(): DateTimeInterface|string
    {
        return $this->updatedAt->format('Y-m-d H:i:s');
    }
}

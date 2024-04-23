<?php

namespace App\Infrastructure\Traits;

use Doctrine\ORM\Mapping\Column;

trait UpdatedAtTrait
{
    #[Column(type: 'datetime', nullable: false, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeInterface $updatedAt;

    /**
     * Set updatedAt.
     */
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * GetRecordingDateFromFileName updatedAt.
     */
    public function getUpdatedAt(): \DateTimeInterface|string
    {
        return $this->updatedAt->format('Y-m-d H:i:s');
    }
}

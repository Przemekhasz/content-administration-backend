<?php

namespace App\Infrastructure\Traits;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping as ORM;

trait CreatedAtTrait
{
    #[Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    protected ?DateTimeInterface $createdAt;


    /**
     * Set createdAt
     */
    public function setCreatedAt(): void
    {
        $this->createdAt  = new DateTime();

        if (property_exists($this, 'createdAt')) {
            $this->createdAt  = new DateTime();
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

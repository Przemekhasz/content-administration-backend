<?php

namespace App\Infrastructure\Entity\Gallery;

use App\Infrastructure\Repository\Gallery\GalleryRepository;
use App\Infrastructure\Traits\UUIDTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'gallery')]
#[ORM\Entity(repositoryClass: GalleryRepository::class)]
class Gallery
{
    use UUIDTrait;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\OneToMany(targetEntity: Image::class, mappedBy: 'gallery', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): void
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setGallery($this);
        }
    }

    public function removeImage(Image $image): void
    {
        if ($this->images->removeElement($image)) {
            if ($image->getGallery() === $this) {
                $image->setGallery(null);
            }
        }
    }

    public function __toString(): string
    {
        return $this->name;
    }
}

<?php

namespace App\Entity;

use App\Repository\FlashRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlashRepository::class)]
class Flash
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 11)]
    private ?string $year = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'flashes')]
    private ?Category $id_category = null;

    #[ORM\ManyToOne(inversedBy: 'flashes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $drawer = null;

    #[ORM\Column]
    private ?bool $available = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdCategory(): ?Category
    {
        return $this->id_category;
    }

    public function setIdCategory(?Category $id_category): self
    {
        $this->id_category = $id_category;

        return $this;
    }

    public function getDrawer(): ?User
    {
        return $this->drawer;
    }

    public function setDrawer(?User $drawer): self
    {
        $this->drawer = $drawer;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getFlashUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }
        if (strpos($this->image, '/') !== false) {
            return $this->image;
        }
        return sprintf('/uploads/flash/%s', $this->image);
    }

}

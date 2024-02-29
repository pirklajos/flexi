<?php

namespace App\Entity;

use App\Repository\ToothRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToothRepository::class)]
class Tooth
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\Column]
    private ?int $position_numeric = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getPositionNumeric(): ?int
    {
        return $this->position_numeric;
    }

    public function setPositionNumeric(int $position_numeric): static
    {
        $this->position_numeric = $position_numeric;

        return $this;
    }

}

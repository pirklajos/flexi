<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRepository::class)]
class Intervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Treatment $treatment = null;

    #[ORM\ManyToMany(targetEntity: Tooth::class)]
    private Collection $teeth;

    public function __construct()
    {
        $this->teeth = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTreatment(): ?Treatment
    {
        return $this->treatment;
    }

    public function setTreatment(Treatment $treatment): static
    {
        $this->treatment = $treatment;

        return $this;
    }

    /**
     * @return Collection<int, Tooth>
     */
    public function getTeeth(): Collection
    {
        return $this->teeth;
    }

    public function addTooth(Tooth $tooth): static
    {
        if (!$this->teeth->contains($tooth)) {
            $this->teeth->add($tooth);
        }

        return $this;
    }

    public function removeTooth(Tooth $tooth): static
    {
        $this->teeth->removeElement($tooth);

        return $this;
    }

}

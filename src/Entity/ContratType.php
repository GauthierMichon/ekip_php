<?php

namespace App\Entity;

use App\Repository\ContratTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratTypeRepository::class)
 */
class ContratType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $plein;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partiel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlein(): ?bool
    {
        return $this->plein;
    }

    public function setPlein(bool $plein): self
    {
        $this->plein = $plein;

        return $this;
    }

    public function getPartiel(): ?bool
    {
        return $this->partiel;
    }

    public function setPartiel(bool $partiel): self
    {
        $this->partiel = $partiel;

        return $this;
    }
}

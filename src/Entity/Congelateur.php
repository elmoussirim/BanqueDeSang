<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CongelateurRepository")
 */
class Congelateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $numCong;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCtCong;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumCong(): ?int
    {
        return $this->numCong;
    }

    public function setNumCong(int $numCong): self
    {
        $this->numCong = $numCong;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getDateCtCong(): ?\DateTimeInterface
    {
        return $this->dateCtCong;
    }

    public function setDateCtCong(\DateTimeInterface $dateCtCong): self
    {
        $this->dateCtCong = $dateCtCong;

        return $this;
    }
}

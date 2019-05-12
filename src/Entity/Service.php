<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
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
    private $nom_service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ChService;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCtSer;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nom_service;
    }

    public function setNomService(string $nom_service): self
    {
        $this->nom_service = $nom_service;

        return $this;
    }

    public function getChService(): ?string
    {
        return $this->ChService;
    }

    public function setChService(string $ChService): self
    {
        $this->ChService = $ChService;

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

    public function getDateCtSer(): ?\DateTimeInterface
    {
        return $this->dateCtSer;
    }

    public function setDateCtSer(\DateTimeInterface $dateCtSer): self
    {
        $this->dateCtSer = $dateCtSer;

        return $this;
    }


}

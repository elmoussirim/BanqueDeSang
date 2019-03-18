<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PocheReserveeRepository")
 */
class PocheReservee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TestDeCompatibilite")
     * @ORM\JoinColumn(nullable=true)
     */
    private $test_de_compatibilite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DemandeSang", inversedBy="pocheReservees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $demande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $n_ordre;
    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestDeCompatibilite(): ?TestDeCompatibilite
    {
        return $this->test_de_compatibilite;
    }

    public function setTestDeCompatibilite(?TestDeCompatibilite $test_de_compatibilite): self
    {
        $this->test_de_compatibilite = $test_de_compatibilite;

        return $this;
    }

    public function getDemande(): ?DemandeSang
    {
        return $this->demande;
    }

    public function setDemande(?DemandeSang $demande): self
    {
        $this->demande = $demande;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNOrdre(): ?int
    {
        return $this->n_ordre;
    }

    public function setNOrdre(int $n_ordre): self
    {
        $this->n_ordre = $n_ordre;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}

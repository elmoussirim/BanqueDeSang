<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestDeCompatibiliteRepository")
 */
class TestDeCompatibilite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DemandeSang")
     * @ORM\JoinColumn(nullable=false)
     */
    private $demande;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $p_deliverees;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $p_testees;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reserve;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getReserve(): ?string
    {
        return $this->reserve;
    }

    public function setReserve(?string $reserve): self
    {
        $this->reserve = $reserve;

        return $this;
    }
    
    public function getPTestees(): ?string
    {
        return $this->p_testees;
    }

    public function setPTestees(?string $p_testees): self
    {
        $this->p_testees = $p_testees;

        return $this;
    }

    public function getPDeliverees(): ?string
    {
        return $this->p_deliverees;
    }

    public function setPDeliverees(?string $p_deliverees): self
    {
        $this->p_deliverees = $p_deliverees;

        return $this;
    }
}

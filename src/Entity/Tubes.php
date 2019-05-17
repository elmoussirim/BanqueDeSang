<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TubesRepository")
 */
class Tubes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $N_ordre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomDonneur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomDonneur;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="7",minMessage="N° CIN doit doit être supérieur à 7 chiffres")
     * @Assert\Length(max="8",maxMessage="N° CIN doit être inférieure à 8 chiffres")
     */
    private $CinDonneur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumTube;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Testee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNOrdre(): ?int
    {
        return $this->N_ordre;
    }

    public function setNOrdre(int $N_ordre): self
    {
        $this->N_ordre = $N_ordre;

        return $this;
    }

    public function getNomDonneur(): ?string
    {
        return $this->NomDonneur;
    }

    public function setNomDonneur(string $NomDonneur): self
    {
        $this->NomDonneur = $NomDonneur;

        return $this;
    }

    public function getPrenomDonneur(): ?string
    {
        return $this->PrenomDonneur;
    }

    public function setPrenomDonneur(string $PrenomDonneur): self
    {
        $this->PrenomDonneur = $PrenomDonneur;

        return $this;
    }

    public function getCinDonneur(): ?int
    {
        return $this->CinDonneur;
    }

    public function setCinDonneur(int $CinDonneur): self
    {
        $this->CinDonneur = $CinDonneur;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
    public function getNumTube(): ?int
    {
        return $this->NumTube;
    }

    public function setNumTube(int $NumTube): self
    {
        $this->NumTube = $NumTube;

        return $this;
    }
    public function getTestee(): ?string
    {
        return $this->Testee;
    }

    public function setTestee(string $Testee): self
    {
        $this->Testee = $Testee;

        return $this;
    }
}

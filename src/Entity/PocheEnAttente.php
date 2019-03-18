<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PocheEnAttenteRepository")
 */
class PocheEnAttente
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
     * @ORM\Column(type="datetime")
     */
    private $Date;

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
     */
    private $CinDonneur;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="integer")
     */

    private $statut;
    
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

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

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    
    public function getStatut(): ?int
    {
        return $this->statut;
    }

    public function setStatut(int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }
}

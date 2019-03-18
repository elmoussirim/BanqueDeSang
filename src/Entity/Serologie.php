<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SerologieRepository")
 */
class Serologie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_de_jour;

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
     * @ORM\Column(type="string", length=255)
     */
    private $CinDonneur;


    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $A_utiliser_avant;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $groupe_sanguins;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_user2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AGHBR;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ACHCV;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TPHA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $HIV;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Resultat_Serologie;
      /**
     * @ORM\Column(type="integer")
     */
    private $statut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeJour(): ?\DateTimeInterface
    {
        return $this->date_de_jour;
    }

    public function setDateDeJour(\DateTimeInterface $date_de_jour): self
    {
        $this->date_de_jour = $date_de_jour;

        return $this;
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

    public function getCinDonneur(): ?string
    {
        return $this->CinDonneur;
    }

    public function setCinDonneur(string $CinDonneur): self
    {
        $this->CinDonneur = $CinDonneur;

        return $this;
    }

    public function getAUtiliserAvant(): ?\DateTimeInterface
    {
        return $this->A_utiliser_avant;
    }

    public function setAUtiliserAvant(string $A_utiliser_avant): self
    {
        try {
    
            $this->A_utiliser_avant = new \DateTime($A_utiliser_avant);
        }
        catch(\Exception $e) {
           //Do Nothing
        }
    
        return $this;
    }
    
    public function getGroupeSanguins(): ?string
    {
        return $this->groupe_sanguins;
    }

    public function setGroupeSanguins(string $groupe_sanguins): self
    {
        $this->groupe_sanguins = $groupe_sanguins;

        return $this;
    }

    public function getIdUser1(): ?int
    {
        return $this->id_user1;
    }

    public function setIdUser1(int $id_user1): self
    {
        $this->id_user1 = $id_user1;

        return $this;
    }

    public function getIdUser2(): ?int
    {
        return $this->id_user2;
    }

    public function setIdUser2(?int $id_user2): self
    {
        $this->id_user2 = $id_user2;

        return $this;
    }

    public function getAGHBR(): ?string
    {
        return $this->AGHBR;
    }

    public function setAGHBR(string $AGHBR): self
    {
        $this->AGHBR = $AGHBR;

        return $this;
    }

    public function getACHCV(): ?string
    {
        return $this->ACHCV;
    }

    public function setACHCV(string $ACHCV): self
    {
        $this->ACHCV = $ACHCV;

        return $this;
    }

    public function getTPHA(): ?string
    {
        return $this->TPHA;
    }

    public function setTPHA(string $TPHA): self
    {
        $this->TPHA = $TPHA;

        return $this;
    }

    public function getHIV(): ?string
    {
        return $this->HIV;
    }

    public function setHIV(string $HIV): self
    {
        $this->HIV = $HIV;

        return $this;
    }

    public function getResultatSerologie(): ?string
    {
        return $this->Resultat_Serologie;
    }

    public function setResultatSerologie(string $Resultat_Serologie): self
    {
        $this->Resultat_Serologie = $Resultat_Serologie;

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

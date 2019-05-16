<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FicheDeDonneurDeSangRepository")
 */
class FicheDeDonneurDeSang
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numero_CIN;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )     */
    private $taille;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )     */
    private $poids;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $RAA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Paludisme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Maladie_pulmonaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Ictere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Diabete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Autre;

    /**
     * @ORM\Column(type="text")
     */
    private $T_A;

    /**
     * @ORM\Column(type="text")
     */
    private $Coeur;

    /**
     * @ORM\Column(type="text")
     */
    private $Appariel_Respiratoire;

    /**
     * @ORM\Column(type="text")
     */
    private $Foie;

    /**
     * @ORM\Column(type="text")
     */
    private $Rate;

    /**
     * @ORM\Column(type="text")
     */
    private $Systeme_nerveux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ApteInapte;


    /**
     * @ORM\Column(type="text")
     */
    private $Observations;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $N_ordre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumeroCIN(): ?int
    {
        return $this->Numero_CIN;
    }

    public function setNumeroCIN(int $Numero_CIN): self
    {
        $this->Numero_CIN = $Numero_CIN;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getRAA(): ?string
    {
        return $this->RAA;
    }

    public function setRAA(?string $RAA): self
    {
        $this->RAA = $RAA;

        return $this;
    }

    public function getPaludisme(): ?string
    {
        return $this->Paludisme;
    }

    public function setPaludisme(?string $Paludisme): self
    {
        $this->Paludisme = $Paludisme;

        return $this;
    }

    public function getMaladiePulmonaire(): ?string
    {
        return $this->Maladie_pulmonaire;
    }

    public function setMaladiePulmonaire(?string $Maladie_pulmonaire): self
    {
        $this->Maladie_pulmonaire = $Maladie_pulmonaire;

        return $this;
    }

    public function getIctere(): ?string
    {
        return $this->Ictere;
    }

    public function setIctere(?string $Ictere): self
    {
        $this->Ictere = $Ictere;

        return $this;
    }

    public function getDiabete(): ?string
    {
        return $this->Diabete;
    }

    public function setDiabete(?string $Diabete): self
    {
        $this->Diabete = $Diabete;

        return $this;
    }

    public function getAutre(): ?string
    {
        return $this->Autre;
    }

    public function setAutre(?string $Autre): self
    {
        $this->Autre = $Autre;

        return $this;
    }

    public function getTA(): ?string
    {
        return $this->T_A;
    }

    public function setTA(string $T_A): self
    {
        $this->T_A = $T_A;

        return $this;
    }

    public function getCoeur(): ?string
    {
        return $this->Coeur;
    }

    public function setCoeur(string $Coeur): self
    {
        $this->Coeur = $Coeur;

        return $this;
    }

    public function getApparielRespiratoire(): ?string
    {
        return $this->Appariel_Respiratoire;
    }

    public function setApparielRespiratoire(string $Appariel_Respiratoire): self
    {
        $this->Appariel_Respiratoire = $Appariel_Respiratoire;

        return $this;
    }

    public function getFoie(): ?string
    {
        return $this->Foie;
    }

    public function setFoie(string $Foie): self
    {
        $this->Foie = $Foie;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->Rate;
    }

    public function setRate(string $Rate): self
    {
        $this->Rate = $Rate;

        return $this;
    }

    public function getSystemeNerveux(): ?string
    {
        return $this->Systeme_nerveux;
    }

    public function setSystemeNerveux(string $Systeme_nerveux): self
    {
        $this->Systeme_nerveux = $Systeme_nerveux;

        return $this;
    }

    public function getApteInapte(): ?string
    {
        return $this->ApteInapte;
    }

    public function setApteInapte(?string $ApteInapte): self
    {
        $this->ApteInapte = $ApteInapte;

        return $this;
    }


    public function getObservations(): ?string
    {
        return $this->Observations;
    }

    public function setObservations(string $Observations): self
    {
        $this->Observations = $Observations;

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
        return $this->N_ordre;
    }

    public function setNOrdre(int $N_ordre): self
    {
        $this->N_ordre = $N_ordre;
        
        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Donneur\DonneurInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\DonneurRepository")
 * @UniqueEntity(
 *  fields= {"NUM_CIN"},
 *  message= "Donneur que vous avez indiqué est déjà exist !"
 * )
 */
class Donneur
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
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_pere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_mere;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat_civil;

   

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="8",minMessage="N° CIN doit etre égale à 8 chiffres")
     */
    private $NUM_CIN;

    /**
     * @ORM\Column(type="string")
     */
    private $Adresse_complete;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="8",minMessage="N° télèphone doit etre égale à 8 chiffres")
     */
    private $numero_telephone;

    /**
     * @ORM\Column(type="string")
     */
    private $profession;

    /**
     * @ORM\Column(type="string")
     */
    private $origine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Dons_anterieurs;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Dons_anterieurs_volontaires;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Dons_anterieurs_familiaux;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_du_dernier_don;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $donneur_convocable;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $don_valide;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_user;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getPrenomPere(): ?string
    {
        return $this->prenom_pere;
    }

    public function setPrenomPere(string $prenom_pere): self
    {
        $this->prenom_pere = $prenom_pere;

        return $this;
    }

    public function getPrenomMere(): ?string
    {
        return $this->prenom_mere;
    }

    public function setPrenomMere(string $prenom_mere): self
    {
        $this->prenom_mere = $prenom_mere;

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

    public function getEtatCivil(): ?string
    {
        return $this->etat_civil;
    }

    public function setEtatCivil(string $etat_civil): self
    {
        $this->etat_civil = $etat_civil;

        return $this;
    }

  

    

    public function getNUMCIN(): ?int
    {
        return $this->NUM_CIN;
    }

    public function setNUMCIN(int $NUM_CIN): self
    {
        $this->NUM_CIN = $NUM_CIN;

        return $this;
    }

    public function getAdresseComplete(): ?string
    {
        return $this->Adresse_complete;
    }

    public function setAdresseComplete(string $Adresse_complete): self
    {
        $this->Adresse_complete = $Adresse_complete;

        return $this;
    }

    public function getNumeroTelephone(): ?int
    {
        return $this->numero_telephone;
    }

    public function setNumeroTelephone(int $numero_telephone): self
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getDonsAnterieurs(): ?string
    {
        return $this->Dons_anterieurs;
    }

    public function setDonsAnterieurs(?string $Dons_anterieurs): self
    {
        $this->Dons_anterieurs = $Dons_anterieurs;

        return $this;
    }

    public function getDonsAnterieursVolontaires(): ?int
    {
        return $this->Dons_anterieurs_volontaires;
    }

    public function setDonsAnterieursVolontaires(?int $Dons_anterieurs_volontaires): self
    {
        $this->Dons_anterieurs_volontaires = $Dons_anterieurs_volontaires;

        return $this;
    }

    public function getDonsAnterieursFamiliaux(): ?int
    {
        return $this->Dons_anterieurs_familiaux;
    }

    public function setDonsAnterieursFamiliaux(?int $Dons_anterieurs_familiaux): self
    {
        $this->Dons_anterieurs_familiaux = $Dons_anterieurs_familiaux;

        return $this;
    }

    public function getDateDuDernierDon(): ?\DateTimeInterface
    {
        return $this->date_du_dernier_don;
    }

    public function setDateDuDernierDon(\DateTimeInterface $date_du_dernier_don): self
    {
        $this->date_du_dernier_don = $date_du_dernier_don;

        return $this;
    }
    public function getDonneurconvocable(): ?string
    {
        return $this->donneur_convocable;
    }

    public function setDonneurconvocable(?string $donneur_convocable): self
    {
        $this->donneur_convocable = $donneur_convocable;

        return $this;
    }
    
    public function getDonvalide(): ?string
    {
        return $this->don_valide;
    }

    public function setDonvalide(string $don_valide): self
    {
        $this->don_valide = $don_valide;

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
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaladeRepository")
 */
class Malade
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
    private $malade;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groupe_sanguin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $n_dossier;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_cin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMalade(): ?string
    {
        return $this->malade;
    }

    public function setMalade(string $malade): self
    {
        $this->malade = $malade;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

 
    public function getNDossier(): ?string
    {
        return $this->n_dossier;
    }

    public function setNDossier(string $n_dossier): self
    {
        $this->n_dossier = $n_dossier;

        return $this;
    } 
    public function getGroupeSanguin(): ?string
    {
        return $this->groupe_sanguin;
    }

    public function setGroupeSanguin(string $groupe_sanguin): self
    {
        $this->groupe_sanguin = $groupe_sanguin;

        return $this;
    }

    

    public function getNumeroCin(): ?int
    {
        return $this->numero_cin;
    }

    public function setNumeroCin(int $numero_cin): self
    {
        $this->numero_cin = $numero_cin;

        return $this;
    }

    
}
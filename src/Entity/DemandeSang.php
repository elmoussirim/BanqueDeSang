<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeSangRepository")
 */
class DemandeSang
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
    private $date_demande;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_utilisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_poche;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $G_S;

    /**
     * @ORM\Column(type="integer")
     */
    private $serum;

    /**
     * @ORM\Column(type="integer")
     */
    private $cin_malade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_malade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_malade;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_user2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="nom_service")
     * @ORM\JoinColumn(nullable=false)
     */
    private $service;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->date_demande;
    }

    public function setDateDemande(\DateTimeInterface $date_demande): self
    {
        $this->date_demande = $date_demande;

        return $this;
    }

    public function getDateUtilisation(): ?\DateTimeInterface
    {
        return $this->date_utilisation;
    }

    public function setDateUtilisation(\DateTimeInterface $date_utilisation): self
    {
        $this->date_utilisation = $date_utilisation;

        return $this;
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

    public function getNombrePoche(): ?int
    {
        return $this->nombre_poche;
    }

    public function setNombrePoche(int $nombre_poche): self
    {
        $this->nombre_poche = $nombre_poche;

        return $this;
    }

    public function getGS(): ?string
    {
        return $this->G_S;
    }

    public function setGS(string $G_S): self
    {
        $this->G_S = $G_S;

        return $this;
    }

    public function getSerum(): ?int
    {
        return $this->serum;
    }

    public function setSerum(int $serum): self
    {
        $this->serum = $serum;

        return $this;
    }

    public function getNomMalade(): ?string
    {
        return $this->nom_malade;
    }

    public function setNomMalade(string $nom_malade): self
    {
        $this->nom_malade = $nom_malade;

        return $this;
    }

    public function getPrenomMalade(): ?string
    {
        return $this->prenom_malade;
    }

    public function setPrenomMalade(string $prenom_malade): self
    {
        $this->prenom_malade = $prenom_malade;

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

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getCinMalade(): ?int
    {
        return $this->cin_malade;
    }

    public function setCinMalade(int $cin_malade): self
    {
        $this->cin_malade = $cin_malade;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

}

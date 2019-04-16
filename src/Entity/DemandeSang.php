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
     * @ORM\ManyToOne(targetEntity="App\Entity\Malade")
     * @ORM\JoinColumn(nullable=false)
     */
    private $malade;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user_2;

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

    public function getMalade(): ?Malade
    {
        return $this->malade;
    }

    public function setMalade(Malade $malade): self
    {
        $this->malade = $malade;

        return $this;
    }
    public function getUser1(): ?User
    {
        return $this->user_1;
    }

    public function setUser1(?User $user_1): self
    {
        $this->user_1 = $user_1;

        return $this;
    }
    public function getUser2(): ?User
    {
        return $this->user_2;
    }

    public function setUser2(?User $user_2): self
    {
        $this->user_2 = $user_2;

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

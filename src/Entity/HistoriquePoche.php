<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoriquePocheRepository")
 */
class HistoriquePoche
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Poche")
     * @ORM\JoinColumn(nullable=false)
     */
    private $poche;

    /**
     * @ORM\Column(type="integer")
     */
    private $user;

    
    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $test_de_compatibilite;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $demande;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $congelateur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $session;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_action;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $agent_service;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function getPoche(): ?Poche
    {
        return $this->poche;
    }

    public function setPoche(?Poche $poche): self
    {
        $this->poche = $poche;

        return $this;
    }
    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(?int $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTestDeCompatibilite(): ?int
    {
        return $this->test_de_compatibilite;
    }

    public function setTestDeCompatibilite(?int $test_de_compatibilite): self
    {
        $this->test_de_compatibilite = $test_de_compatibilite;

        return $this;
    }

    public function getDemande(): ?int
    {
        return $this->demande;
    }

    public function setDemande(?int $demande): self
    {
        $this->demande = $demande;

        return $this;
    }

    public function getCongelateur(): ?int
    {
        return $this->congelateur;
    }

    public function setCongelateur(int $congelateur): self
    {
        $this->congelateur = $congelateur;

        return $this;
    }

    public function getSession(): ?string
    {
        return $this->session;
    }

    public function setSession(?string $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): self
    {
        $this->raison = $raison;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateAction(): ?\DateTimeInterface
    {
        return $this->date_action;
    }

    public function setDateAction(\DateTimeInterface $date_action): self
    {
        $this->date_action = $date_action;

        return $this;
    }
    
    public function getAgentService(): ?string
    {
        if ($this->agent_service == null)
            return " ";
        else
            return $this->agent_service;
    }

    public function setAgentService(string $agent_service): self
    {
        $this->agent_service = $agent_service;

        return $this;
    }

    public function getDateAct(): ?string
    {
        $date_action = $this->date_action ;


        $dateDmy = $date_action->format('d/m/y');

        return $dateDmy;
        
    }
}

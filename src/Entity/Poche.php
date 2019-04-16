<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PocheRepository")
 */
class Poche
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
     * @ORM\Column(type="integer")
     */
    private $n_ordre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_donneur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_donneur;

    /**
     * @ORM\Column(type="integer")
     */
    private $cin_donneur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $a_utiliser_avant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupe_sanguin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $test_de_compatibilite;

    /**
     *  @ORM\Column(type="integer", nullable=true)
     */
    private $demande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Congelateur")
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
        return $this->n_ordre;
    }

    public function setNOrdre(int $n_ordre): self
    {
        $this->n_ordre = $n_ordre;

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

    public function getNomDonneur(): ?string
    {
        return $this->nom_donneur;
    }

    public function setNomDonneur(string $nom_donneur): self
    {
        $this->nom_donneur = $nom_donneur;

        return $this;
    }

    public function getPrenomDonneur(): ?string
    {
        return $this->prenom_donneur;
    }

    public function setPrenomDonneur(string $prenom_donneur): self
    {
        $this->prenom_donneur = $prenom_donneur;

        return $this;
    }

    public function getCinDonneur(): ?int
    {
        return $this->cin_donneur;
    }

    public function setCinDonneur(int $cin_donneur): self
    {
        $this->cin_donneur = $cin_donneur;

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

    public function getAUtiliserAvant(): ?\DateTimeInterface
    {
        return $this->a_utiliser_avant;
    }

    public function setAUtiliserAvant(?\DateTimeInterface $a_utiliser_avant): self
    {
        $this->a_utiliser_avant = $a_utiliser_avant;

        return $this;
    }

    public function getGroupeSanguin(): ?string
    {
        return $this->groupe_sanguin;
    }

    public function setGroupeSanguin(?string $groupe_sanguin): self
    {
        $this->groupe_sanguin = $groupe_sanguin;

        return $this;
    }

    public function getTestDeCompatibilite(): ?int
    {
        return $this->test_de_compatibilite;
    }

    public function setTestDeCompatibilite(int $test_de_compatibilite): self
    {
        $this->test_de_compatibilite = $test_de_compatibilite;

        return $this;
    }

    public function getDemande(): ?int
    {
        return $this->demande;
    }

    public function setDemande(int $demande): self
    {
        $this->demande = $demande;

        return $this;
    }

    public function getCongelateur(): ?Congelateur
    {
        return $this->congelateur;
    }

    public function setCongelateur(?Congelateur $congelateur): self
    {
        $this->congelateur = $congelateur;

        return $this;
    }

    public function getSession(): ?string
    {
        if ($this->session == null)
            return " ";
        else
            return $this->session;
    }

    public function setSession(?string $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getRaison(): ?string
    {
        if ($this->raison == null)
            return " ";
        else
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

    public function getetype($val): ?int
    {
        if ($this->statut == "Poche en attente ---> Poche en stock" || $this->statut == "Poche sortie ---> Poche en stock" || $this->statut = "Poche en stock" || $this->statut == "Poche reservée ---> Poche en stock")
            {
                if ($this->type == $val && $this->date_action == date()) 
                 return 1;
                else return 0;
            }
    }

    public function getstype($val): ?int
    {
        if ($this->statut == "Poche en stock ---> Poche sortie" || $this->statut == "Poche reservée ---> Poche sortie")
            {
                if ($this->type == $val && $this->date_action == date()) 
                 return 1;
                else return 0;
            }
    }

    public function getstock(): ?int
    {
        if ($this->statut == "Poche en attente ---> Poche en stock" || $this->statut == "Poche sortie ---> Poche en stock" || $this->statut = "Poche en stock" || $this->statut == "Poche reservée ---> Poche en stock")
            {
                 return 1;
            }
        else
            return 0;
    }

    public function getsstock(): ?int
    {
        if ($this->statut == "Poche en stock ---> Poche sortie" || $this->statut == "Poche reservée ---> Poche sortie")
            {
                if ($this->date_action == date('d/m/y'))
                    return 1;
                else return 0;
            }
    }
    public function getestock(): ?int
    {
        if ($this->statut == "Poche en attente ---> Poche en stock" || $this->statut == "Poche sortie ---> Poche en stock" || $this->statut = "Poche en stock"|| $this->statut == "Poche reservée ---> Poche en stock")
            {
                if ($this->date_action == date('d/m/y')) 
                    return 1;

                else return 0;
            }
    }
    public function getDateAct(): ?string
    {
        $date_action = $this->date_action ;


        $dateDmy = $date_action->format('d/m/y');

        return $dateDmy;
        
    }

}

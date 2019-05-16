<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *  fields= {"email"},
 *  message= "L'email que vous avez indiqué est déjà utilisé !"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255) 
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage="Votre mot de passe doit faire minimum 8 caractères")
     */
    private $password;

      /**
      * @Assert\EqualTo(propertyPath="password" , message="Vous n'avez pas tapé le méme mot de passe")
      */
    public  $confirm_password;
    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="7",minMessage="N° CIN doit etre supp à 7 chiffres")
     * @Assert\Length(max="8",maxMessage="N° CIN doit etre inf à 8 chiffres")
     */
    private $NUM_CIN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poste;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

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
    public function eraseCredentials() {}

    public function getSalt() {}
        
    public function getRoles()
    {
        if ($this->poste =="Administrateur")
            return ['ROLE_ADMIN'];
        elseif ($this->poste =="Agent d'accueil")
            return ['ROLE_AGACC'];
        elseif ($this->poste =="Médecin de prélèvement")
            return ['ROLE_MEDPRE'];
        elseif ($this->poste=="Infirmière de prélèvement")
            return ['ROLE_INFPRE'];
        elseif ($this->poste =="Infirmière de service")
            return ['ROLE_INFSER'];
        elseif ($this->poste =="Médecin de service")
            return ['ROLE_MEDSER'];
        else
            return ['ROLE_TECHLAB'];
    }   


}

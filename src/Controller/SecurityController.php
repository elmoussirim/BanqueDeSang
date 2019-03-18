<?php

namespace App\Controller;

use App\Entity\User;


use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
  
  
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(){
        return $this->render('security/login.html.twig');
    }  
     /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){

        return $this->render('home.html.twig');
    } 


      
}

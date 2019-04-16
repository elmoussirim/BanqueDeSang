<?php

namespace App\Controller;
use App\Entity\Donneur;
use App\Entity\User;

use App\Entity\FicheDeDonneurDeSang;
use App\Form\FichemedicalType;
use App\Form\FicheMedicaleEditType;

use App\Repository\UserRepository;





use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class FichemedicalController extends AbstractController
{


    /**
    * @Route ("/fiche/medicale/edit" , name="fiche_search")
    */
      public function edit_fiche(Request $request, ObjectManager $manager){
       
        $request = Request::createFromGlobals();

        $search = $request->query->get('search');


        $em = $this->getDoctrine()->getManager();
        $fiche=$em->getRepository(FicheDeDonneurDeSang::class)->findOne($search);
       
        $formficheedit = $this->createForm(FicheMedicaleEditType::class,$fiche);

        $formficheedit->handleRequest($request);

        if($formficheedit->isSubmitted() && $formficheedit->isValid() ){
                        
            $manager->persist($fiche);
            $manager->flush();

            
            return $this->redirectToRoute('fiche_show',['id'=>$fiche->getId()]);
        }
      
        return $this->render('fichemedical/editfiche.html.twig',[
            'formficheedit' => $formficheedit->createView(),
            'fiche' => $fiche
            ]);
    }

       
     /**
     * @Route("/fiche/new",name="fichemedical_create")
     */
    public function create(Request $request, ObjectManager $manager){
        $FicheDeDonneurDeSang = new FicheDeDonneurDeSang();
        $form = $this->createForm(FichemedicalType::class, $FicheDeDonneurDeSang);
                   
                    
        $form->handleRequest($request);

        
        if($form->isSubmitted() && $form->isValid() ){
            
            $FicheDeDonneurDeSang->setDate(new \DateTime());
            $FicheDeDonneurDeSang->setUser($this->getUser());

            
            $manager->persist($FicheDeDonneurDeSang);
            $manager->flush();
            
            if ($FicheDeDonneurDeSang->getApteInapte() == "Apte")
            {
                $donneur=$this->getDoctrine()->getRepository(Donneur::class)->ModifierDateApte($FicheDeDonneurDeSang->getNumeroCIN());
            }   
            else
            {
                $donneur=$this->getDoctrine()->getRepository(Donneur::class)->ModifierApteInapte($FicheDeDonneurDeSang->getNumeroCIN(),"Donneur invalide");
            }
        
           return $this->redirectToRoute('fiche_show',['id'=>$FicheDeDonneurDeSang->getId()]);
        }

        return $this->render('fichemedical/create.html.twig' , [
            'formfichemedical' => $form->createview()
        ]); 
    }

         /**
      * @Route ("/fiche/{id}" , name="fiche_show")
      */
      public function show(FicheDeDonneurDeSang $fiche){
        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository(User::class)->findOne($fiche->getUser());

        return $this->render('fichemedical/show.html.twig', [
            'controller_name' => 'FichemedicalController',
            'fiche'=>$fiche,
            'user' => $user
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Donneur;
use App\Entity\User;
use App\Entity\FicheDeDonneurDeSang;

use App\Form\FichemedicalType;
use App\Form\FicheMedicaleEditType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class FichemedicalController extends AbstractController
{

        /**
        * @Route("/fiche/search", name="search_fiche") 
        * */
        public function searchfiche()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');
    
    
            $em = $this->getDoctrine()->getManager();
            $fiche=$em->getRepository(FicheDeDonneurDeSang::class)->findByExampleField($search);
            $repo2=$this->getDoctrine()->getRepository(User::class);
            $user= $repo2->findOne($fiche->getUser());

            return $this->render('fichemedical/show.html.twig', [
                'controller_name' => 'FichemedicalController',
                'fiche'=>$fiche,
                'user' => $user
            ]);
        }

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

            
            return $this->redirectToRoute('tube_new');
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
        $message = null;         
                    
        $form->handleRequest($request);
        
        
        if($form->isSubmitted() && $form->isValid()){
            $repo1=$this->getDoctrine()->getRepository(Donneur::class);
            $donneur= $repo1->find($FicheDeDonneurDeSang->getNumDonneur());
            if($donneur !=null) {
            $FicheDeDonneurDeSang->setNumeroCIN($donneur->getNUMCIN());
            $FicheDeDonneurDeSang->setNom($donneur->getNom());
            $FicheDeDonneurDeSang->setPrenom($donneur->getPrenom());
            $FicheDeDonneurDeSang->setDateDeNaissance($donneur->getDateDeNaissance());
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
        if($donneur == null){
            $message = "vérifier le N° de donneur ";
        }
    }
        return $this->render('fichemedical/create.html.twig' , [
            'formfichemedical' => $form->createview(),
            'message' => $message
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

     /**
      * @Route ("/fiches" , name="showall_fiche")
      */
      public function showall(){
        $em = $this->getDoctrine()->getManager();
        $fiches=$em->getRepository(FicheDeDonneurDeSang::class)->findAll();
        $users=$em->getRepository(User::class)->findAll();

        return $this->render('fichemedical/showall.html.twig', [
            'controller_name' => 'FichemedicalController',
            'fiches'=>$fiches,
            'users' => $users
        ]);
    }

}

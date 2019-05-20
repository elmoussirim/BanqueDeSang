<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Congelateur;
use App\Entity\Poche;

use App\Entity\Tubes;
use App\Form\TubesType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Donneur;

class PrelevementController extends AbstractController
{    
    /**
     * @Route("/tube/new", name="tube_new") 
     * */
    public function formtube (Request $request ,ObjectManager $manager){
                  

        $tube= new Tubes();

        $formtube = $this->createForm(TubesType::class, $tube);

        $formtube->handleRequest($request);
        $message = null;         

        if($formtube->isSubmitted() && $formtube->isValid() ){
            $repo1=$this->getDoctrine()->getRepository(Donneur::class);
            $donneur= $repo1->find($tube->getNumDonneur());
            if($donneur !=null) {
                $tube->setCinDonneur($donneur->getNUMCIN());
                $tube->setNomDonneur($donneur->getNom());
                $tube->setPrenomDonneur($donneur->getPrenom());
                $tube->setUser($this->getUser());

                $tube->setDate(new \DateTime());

                $tube->setTestee("Non");

                $manager->persist($tube);

                $manager->flush();
                return $this->redirectToRoute('tubes');
            }
            if($donneur == null){
                $message = "vérifier le N° de donneur ";
            }
        }
        return $this->render('Tubes/create.html.twig', [
            'formtube' => $formtube->createView(),
            'message' => $message
        ]);
    }

    /**
     * @Route("/tubes/a/tester", name="tubes")
     */
    public function tubes()
    {
        $repo1=$this->getDoctrine()->getRepository(Tubes::class);
        $repo2=$this->getDoctrine()->getRepository(User::class);

        $tubes= $repo1->findBySomeField();
        $users= $repo2->findAll();

        return $this->render('Tubes/tubes.html.twig', [
            'controller_name' => 'PrelevementController',
            'tubes'=>$tubes,
            'users' =>$users
        ]);
    }

     /**
     * @Route("/tube/testee/{id}", name="tube_terminee") 
     * */
    public function tubeTestee(Tubes $tube, Request $request,ObjectManager $manager ){

            $request = Request::createFromGlobals();

            $em = $this->getDoctrine()->getManager();
            $tube=$em->getRepository(Tubes::class)->ModifierTerminer($tube->getId(),"Oui"); 

            $repo1=$this->getDoctrine()->getRepository(Tubes::class);
            $tubes= $repo1->findAll();

            $repo2=$this->getDoctrine()->getRepository(User::class);
            $users= $repo2->findAll();

            return $this->redirectToRoute('tubes');

            return $this->render('Tubes/tubes.html.twig', [
                'controller_name' => 'PrelevementController',
                'tubes'=>$tubes,
                'users'=>$users
            ]);
            
    } 

        /**
        * @Route("/tube/search", name="search_tube") 
        * */
        public function searchTube()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');


            $em = $this->getDoctrine()->getManager();
            $tubes=$em->getRepository(Tubes::class)->findByExampleField($search);

            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();

            return $this->render('Tubes/tubes.html.twig', [
                'controller_name' => 'PrelevementController',
                'tubes'=>$tubes,
                'users'=> $users
            ]);
            
        }
    

        /**
        * @Route("/PocheEnAttente/search", name="search_pochesenattente") 
        * */
        public function searchPocheEnAttente()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');


            $em = $this->getDoctrine()->getManager();
            $poches=$em->getRepository(Poche::class)->findByExampleField($search);
            $repo=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo->findAll();
            return $this->render('poche/pocheenattente.html.twig', [
                'controller_name' => 'PrelevementController',
                'poches'=>$poches,
                'congelateur'=> $congelateur
            ]);
            
        }
}

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

class PrelevementController extends AbstractController
{    
    /**
     * @Route("/tube/new", name="tube_new") 
     * */
    public function formtube (Request $request ,ObjectManager $manager){
                  

        $tube1= new Tubes();
        $tube2= new Tubes();

        $formtube = $this->createForm(TubesType::class, $tube1);

        $formtube->handleRequest($request);

        if($formtube->isSubmitted() && $formtube->isValid() ){

            $tube2->setNOrdre($tube1->getNOrdre());
            $tube2->setCinDonneur($tube1->getCinDonneur());
            $tube2->setNomDonneur($tube1->getNomDonneur());
            $tube2->setPrenomDonneur($tube1->getPrenomDonneur());
            $tube1->setUser($this->getUser());
            $tube2->setUser($this->getUser());

            $tube1->setDate(new \DateTime());
            $tube2->setDate(new \DateTime());

            $tube1->setNumTube(1);
            $tube2->setNumTube(2);
            $tube1->setTestee("Non");
            $tube2->setTestee("Non");

            $manager->persist($tube1);
            $manager->persist($tube2);

            $manager->flush();
            return $this->redirectToRoute('index');
            
        }
        return $this->render('Tubes/create.html.twig', [
            'formtube' => $formtube->createView()
        ]);
    }

    /**
     * @Route("/tubes/a/tester", name="tubes")
     */
    public function tubes()
    {
        $repo1=$this->getDoctrine()->getRepository(Tubes::class);
        $repo2=$this->getDoctrine()->getRepository(User::class);

        $tubes= $repo1->findAll();
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

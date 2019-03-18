<?php

namespace App\Controller;

use App\Entity\PocheEnAttente;
use App\Form\PocheEnAttenteType;
use App\Entity\User;

use App\Entity\Tubes;
use App\Form\TubesType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class PrelevementController extends AbstractController
{

    /**
     * @Route("/poche/apres/separation/new", name="search_inf_don") 
     * @Route("/poche/apres/separation/new", name="PocheEnAttente_new") 
     * */
    public function formPocheEnAttente (Request $request ,ObjectManager $manager){

        $request = Request::createFromGlobals();

        $search = $request->query->get('search');


        $em = $this->getDoctrine()->getManager();
        $tube=$em->getRepository(Tubes::class)->findOneBySomeField($search);

        $PocheEnAttente = new PocheEnAttente();
        
        $formPocheEnAttente = $this->createForm(PocheEnAttenteType::class, $PocheEnAttente);

        $formPocheEnAttente->handleRequest($request);
        
        if($formPocheEnAttente->isSubmitted() && $formPocheEnAttente->isValid() ){
            $PocheEnAttente->setNOrdre($tube->getNOrdre());
            $PocheEnAttente->setCinDonneur($tube->getCinDonneur());
            $PocheEnAttente->setNomDonneur($tube->getNomDonneur());
            $PocheEnAttente->setPrenomDonneur($tube->getPrenomDonneur());
            $PocheEnAttente->setDate(new \DateTime());
            $PocheEnAttente->setIdUser($this->getUser()->getId());
            $PocheEnAttente->setStatut(1);

            
            if($PocheEnAttente->getType() == "CG"){
                $PocheEnAttente2 = new PocheEnAttente();
                $PocheEnAttente2->setNOrdre($tube->getNOrdre());
                $PocheEnAttente2->setStatut(1);

                $PocheEnAttente2->setCinDonneur($tube->getCinDonneur());
                $PocheEnAttente2->setNomDonneur($tube->getNomDonneur());
                $PocheEnAttente2->setPrenomDonneur($tube->getPrenomDonneur());
                $PocheEnAttente2->setDate(new \DateTime());
                $PocheEnAttente2->setType("Plasma");
                $PocheEnAttente2->setIdUser($this->getUser()->getId());
                $manager->persist($PocheEnAttente2);
            }
            $manager->persist($PocheEnAttente);

            $manager->flush();
            return $this->redirectToRoute('PocheEnAttente_new');

        }
        return $this->render('pocheenattente/create.html.twig', [
            'controller_name' => 'PrelevementController',
            'tube'=>$tube,
            'formPocheEnAttente' => $formPocheEnAttente->createView()
        ]);
    }
      
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
            $tube1->setIdUser($this->getUser()->getId());
            $tube2->setIdUser($this->getUser()->getId());

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
     * @Route("/poches/en/attente", name="poches_en_attentes")
     */
    public function PocheEnAttente()
    {
        $repo1=$this->getDoctrine()->getRepository(PocheEnAttente::class);
        $repo2=$this->getDoctrine()->getRepository(User::class);

        $PochesEnAttentes= $repo1->findAll();
        $users= $repo2->findAll();

        return $this->render('pocheenattente/PocheEnAttente.html.twig', [
            'controller_name' => 'PrelevementController',
            'PochesEnAttentes'=>$PochesEnAttentes,
            'users' =>$users
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
            $PochesEnAttentes=$em->getRepository(PocheEnAttente::class)->findByExampleField($search);
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
            return $this->render('pocheenattente/PocheEnAttente.html.twig', [
                'controller_name' => 'PrelevementController',
                'PochesEnAttentes'=>$PochesEnAttentes,
                'users'=> $users
            ]);
            
        }
}

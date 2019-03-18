<?php

namespace App\Controller;
use App\Entity\Donneur;
use App\Entity\PocheEntree;
use App\Entity\User;

use App\Entity\FicheDeDonneurDeSang;
use App\Form\PocheEntreeType;
use App\Entity\Tubes;
use App\Form\TubesType;
use App\Entity\PocheEnAttente;

use App\Entity\Serologie;
use App\Form\SerologieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class PocheController extends AbstractController
{
                        /* Show All Serologies */

    /**
     * @Route("/serologies", name="serologies_donneur")
     */
    public function serologie()
    {
        $repo=$this->getDoctrine()->getRepository(Serologie::class);

        $serologies= $repo->findAll();

        return $this->render('technicienlabo/serologie/serologies.html.twig', [
            'controller_name' => 'PocheController',
            'serologies'=>$serologies
        ]);
    }
    
    /**
     * @Route("/stock/poches", name="poches_entrees")
     */
    public function stockpoche()
    {
        $repo1=$this->getDoctrine()->getRepository(PocheEntree::class);

        $pochesentrees= $repo1->findAll();

        return $this->render('technicienlabo/pochesentrees/pochesentrees.html.twig', [
            'controller_name' => 'PocheController',
            'pochesentrees'=>$pochesentrees,
        ]);
    }
                        /* Show Serologie */
        /**
        * @Route("/serologie/search", name="search_serologie") 
        * */
        public function searchSerologie()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');


            $em = $this->getDoctrine()->getManager();
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($search);

 
            return $this->render('technicienlabo/serologie/serologies.html.twig', [
                'controller_name' => 'PocheController',
                'serologies'=>$serologies
            ]);
        }

        /**
        * @Route("/serologie/show/{id}", name="show_serologie")
        */
        public function show (Serologie $serologie){

        $repo=$this->getDoctrine()->getRepository(User::class);
        $users= $repo->findAll();

            return $this->render('technicienlabo/serologie/serologie.html.twig', [
                'controller_name' => 'PocheController',
                'serologie'=>$serologie,
                'users' => $users,
            ]);
        }

        /**
        * @Route("/poche/en/stock/{id}", name="create_newvalide") 
        * */
        public function createpocheentree(PocheEnAttente $pocheenattente,Request $request, ObjectManager $manager)
        {
            $em = $this->getDoctrine()->getManager();
            $PocheEnAttente=$em->getRepository(PocheEnAttente::class)->find($pocheenattente->getId());
            $serologie=$em->getRepository(Serologie::class)->findOneBySomeField($PocheEnAttente->getNOrdre());
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
            $pocheentree = new PocheEntree();
          

                $pocheentree ->setDate(new \DateTime());
                $pocheentree->setNOrdre($serologie->getNOrdre());

                $pocheentree->setAUtiliserAvant($serologie->getAUtiliserAvant());
                $pocheentree ->setCinDonneur($serologie->getCinDonneur());
                $pocheentree ->setNomDonneur($serologie->getNomDonneur());
                $pocheentree ->setPrenomDonneur($serologie->getPrenomDonneur());
                $pocheentree ->setIdUser($this->getUser()->getId());
                $pocheentree ->setType($PocheEnAttente->getType());

                $pocheentree ->setGS($serologie->getGroupeSanguins());
                $pocheentree ->setStatut(1);


                $manager->persist($pocheentree);
                $manager->flush();

                $serologiestatut=$this->getDoctrine()->getRepository(Serologie::class)->ModifierStatut($serologie->getNOrdre(),0);
                $pocheenattente=$this->getDoctrine()->getRepository(PocheEnAttente::class)->ModifierStatut($serologie->getNOrdre(),0);

                return $this->redirectToRoute('poches_entrees');

            return $this->render('technicienlabo/pochesentrees/create.html.twig', [
                'controller_name' => 'PocheController',
                'users'=>'users'
                ]);
        }

        /**
        * @Route("/poche/search", name="search_poche_st") 
        * */
        public function searchPoche()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');

            $em = $this->getDoctrine()->getManager();
            
            $pocheentree=$em->getRepository(PocheEntree::class)->findOneBySomeField($search,"ST");
            $PocheEnAttente=$em->getRepository(PocheEnAttente::class)->findOneBySomeField($search,"ST");
            $fichemedicale=$em->getRepository(FicheDeDonneurDeSang::class)->findOneBySomeField($search);
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($search);

            $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($fichemedicale->getNumeroCIN());
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
    
            

            return $this->render('technicienlabo/pochesentrees/poche.html.twig', [
                'controller_name' => 'PocheController',
                'pocheentree'=> $pocheentree,
                'donneur'=> $donneur,
                'PocheEnAttente' => $PocheEnAttente,
                'serologies'=> $serologies,
                'fichemedicale' => $fichemedicale,
                'users' => $users
            ]);
        }
        /**
        * @Route("/poche/search/cg", name="search_poche_cg") 
        * */
        public function searchPocheCG()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');

            $em = $this->getDoctrine()->getManager();
            
            $pocheentree=$em->getRepository(PocheEntree::class)->findOneBySomeField($search,"CG");
            $PocheEnAttente=$em->getRepository(PocheEnAttente::class)->findOneBySomeField($search,"CG");
            $fichemedicale=$em->getRepository(FicheDeDonneurDeSang::class)->findOneBySomeField($search);
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($search);

            $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($fichemedicale->getNumeroCIN());
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
    
            

            return $this->render('technicienlabo/pochesentrees/poche.html.twig', [
                'controller_name' => 'PocheController',
                'pocheentree'=> $pocheentree,
                'donneur'=> $donneur,
                'PocheEnAttente' => $PocheEnAttente,
                'serologies'=> $serologies,
                'fichemedicale' => $fichemedicale,
                'users' => $users
            ]);
        }
        /**
        * @Route("/poche/search", name="search_poche_plasma") 
        * */
        public function searchPochePlasma()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');

            $em = $this->getDoctrine()->getManager();
            
            $pocheentree=$em->getRepository(PocheEntree::class)->findOneBySomeField($search,"Plasma");
            $PocheEnAttente=$em->getRepository(PocheEnAttente::class)->findOneBySomeField($search,"Plasma");
            $fichemedicale=$em->getRepository(FicheDeDonneurDeSang::class)->findOneBySomeField($search);
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($search);

            $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($fichemedicale->getNumeroCIN());
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
    
            

            return $this->render('technicienlabo/pochesentrees/poche.html.twig', [
                'controller_name' => 'PocheController',
                'pocheentree'=> $pocheentree,
                'donneur'=> $donneur,
                'PocheEnAttente' => $PocheEnAttente,
                'serologies'=> $serologies,
                'fichemedicale' => $fichemedicale,
                'users' => $users
            ]);
        }
    /**
     * @Route("/serologie/new/{id}", name="tube_show") 
     * */
    public function createserologie (Serologie $serologie=null, Tubes $tube, Request $request,ObjectManager $manager ){
 
        $serologie = new Serologie();
        
        
        $formserologie = $this->createForm(SerologieType::class, $serologie);
                   
        $request = Request::createFromGlobals();
                        
        $formserologie->handleRequest($request);

        
        if($formserologie->isSubmitted() && $formserologie->isValid() ){
            $serologie->setNOrdre($tube->getNOrdre());
            $serologie->setCinDonneur($tube->getCinDonneur());
            $serologie->setNomDonneur($tube->getNomDonneur());
            $serologie->setPrenomDonneur($tube->getPrenomDonneur());
            $serologie->setDatedejour(new \DateTime());
            $serologie->setStatut(1);
			
			$serologie->setIdUser1($this->getUser()->getId());
			
            
            $manager->persist($serologie);
            $manager->flush();
            $donneur=$this->getDoctrine()->getRepository(Donneur::class)->ModifierApteInapte($serologie->getCinDonneur(),$serologie->getResultatSerologie());

            
            return $this->redirectToRoute('show_serologie',['id'=>$serologie->getId()]);
        }
        return $this->render('technicienlabo/serologie/create.html.twig',[
            'controller_name' => 'PocheController',
            'formserologie' => $formserologie->createView(),
            'tube' => $tube,
         ]);
    } 
	/**
     *@Route("/serologie/{id}/edit",name="serologie_edit")
     * */
    public function editeserologie (Serologie $serologie, Request $request,ObjectManager $manager ){
      
        $formserologie = $this->createForm(SerologieType::class, $serologie);
                   
        $request = Request::createFromGlobals();
            
        $formserologie->handleRequest($request);

        
        if($formserologie->isSubmitted() && $formserologie->isValid() ){
            
            if($serologie->getIdUser()!=$this->getUser()->getId())
            {
                $serologie->setIdUser2($this->getUser()->getId());
            }
            $manager->persist($serologie);
            $manager->flush();
            $donneur=$this->getDoctrine()->getRepository(Donneur::class)->ModifierApteInapte($serologie->getCinDonneur(),$serologie->getResultatSerologie());

            
            return $this->redirectToRoute('show_serologie',['id'=>$serologie->getId()]);
        }
        return $this->render('technicienlabo/serologie/edite.html.twig',[
            'controller_name' => 'PocheController',
            'formserologie' => $formserologie->createView(),
            'editMode' =>$serologie->getId()!==null,
            'serologie' => $serologie
         ]);
    } 


        /**
        * @Route("/serologie/termnier/{id}", name="terminer_serologie")
        */
        public function SerologieTerminee (Serologie $serologie){

            $em = $this->getDoctrine()->getManager();
            $tubeterminee=$em->getRepository(Serologie::class)->ModifierStatut($serologie->getNOrdre(),0); 
            return $this->redirectToRoute('serologies_donneur');

            return $this->render('technicienlabo/serologie/serologie.html.twig');
            }
    /**
     * @Route("/stock/poches/st", name="poches_entrees_st")
     */
    public function stockpoches()
    {
        $repo1=$this->getDoctrine()->getRepository(PocheEntree::class);

        $pochesentrees= $repo1->findByType("ST");

        return $this->render('technicienlabo/pochesentrees/pochesentreesst.html.twig', [
            'controller_name' => 'PocheController',
            'pochesentrees'=>$pochesentrees,
        ]);
    }
    /**
        * @Route("/stock/poches/cg", name="pochesCG")
     */
    public function stockpochecg()
    {
        $repo1=$this->getDoctrine()->getRepository(PocheEntree::class);

        $pochesentrees= $repo1->findByType("CG");

        return $this->render('technicienlabo/pochesentrees/pochesentreescg.html.twig', [
            'controller_name' => 'PocheController',
            'pochesentrees'=>$pochesentrees,
        ]);
    }
    /**
     * @Route("/stock/poches/plasma", name="poches_entrees_plasma")
     */
    public function stockpocheplasma()
    {
        $repo1=$this->getDoctrine()->getRepository(PocheEntree::class);

        $pochesentrees= $repo1->findByType("Plasma");

        return $this->render('technicienlabo/pochesentrees/pochesentreesplasma.html.twig', [
            'controller_name' => 'PocheController',
            'pochesentrees'=>$pochesentrees,
        ]);
    }
}

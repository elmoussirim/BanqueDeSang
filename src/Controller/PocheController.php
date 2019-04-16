<?php

namespace App\Controller;
use Symfony\Component\Validator\Constraints\Date;
use App\Entity\DemandeSang;
use App\Entity\Donneur;
use App\Entity\User;
use App\Entity\Congelateur;
use App\Entity\FicheDeDonneurDeSang;

use App\Entity\Tubes;
use App\Entity\TestDeCompatibilite;

use App\Entity\Poche;
use App\Form\PocheType;

use App\Entity\HistoriquePoche;
use App\Form\PocheEditStatutType;

use App\Entity\Serologie;
use App\Form\SerologieType;

use App\Entity\GestionStock;
use App\Entity\Alertes;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
        * @Route("/poche/search", name="search_poche_st") 
        * */
        public function searchPoche()
        {
            $fichemedicale =null;
            $donneur = null;
            $serologie = null;
            $request = Request::createFromGlobals();

            $search = $request->query->get('search_st');

            $em = $this->getDoctrine()->getManager();
            
            $poche=$em->getRepository(Poche::class)->findOneBySomeField($search,"ST");
            $historique=$em->getRepository(HistoriquePoche::class)->findBySomeField($poche);
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($search);
            $fichemedicale=$em->getRepository(FicheDeDonneurDeSang::class)->findByExampleField($search);
            if ($fichemedicale != null){
                $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($fichemedicale->getNumeroCIN());
            }
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
    
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();

            return $this->render('Poche/poche.html.twig', [
                'controller_name' => 'PocheController',
                'poche'=> $poche,
                'donneur'=> $donneur,
                'historique' => $historique,
                'serologies'=> $serologies,
                'fichemedicale' => $fichemedicale,
                'users' => $users,
                'congelateur' => $congelateur
            ]);
        }
        /**
        * @Route("/poche/search/cg", name="search_poche_cg") 
        * */
        public function searchPocheCG()
        {
            $fichemedicale =null;
            $donneur = null;
            $serologies = null;
            $request = Request::createFromGlobals();

            $search = $request->query->get('search_cg');

            $em = $this->getDoctrine()->getManager();
            
            $poche=$em->getRepository(Poche::class)->findOneBySomeField($search,"CG");
            $historique=$em->getRepository(HistoriquePoche::class)->findBySomeField($poche);
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($search);
            $fichemedicale=$em->getRepository(FicheDeDonneurDeSang::class)->findByExampleField($search);
            if ($fichemedicale != null){
                $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($fichemedicale->getNumeroCIN());
            }
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
    
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();

            return $this->render('Poche/poche.html.twig', [
                'controller_name' => 'PocheController',
                'poche'=> $poche,
                'donneur'=> $donneur,
                'historique' => $historique,
                'serologies'=> $serologies,
                'fichemedicale' => $fichemedicale,
                'users' => $users,
                'congelateur' => $congelateur
            ]);
        }
        /**
        * @Route("/poche/search/plasma", name="search_poche_plasma") 
        * */
        public function searchPochePlasma()
        {
            $fichemedicale =null;
            $donneur = null;
            $serologies = null;
            $request = Request::createFromGlobals();

            $search = $request->query->get('search_plasma');

            $em = $this->getDoctrine()->getManager();
            
            $poche=$em->getRepository(Poche::class)->findOneBySomeField($search,"Plasma");
            $historique=$em->getRepository(HistoriquePoche::class)->findBySomeField($poche);
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($search);
            $fichemedicale=$em->getRepository(FicheDeDonneurDeSang::class)->findByExampleField($search);
            if ($fichemedicale != null){
                $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($fichemedicale->getNumeroCIN());
            }
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
    
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();

            return $this->render('Poche/poche.html.twig', [
                'controller_name' => 'PocheController',
                'poche'=> $poche,
                'donneur'=> $donneur,
                'historique' => $historique,
                'serologies'=> $serologies,
                'fichemedicale' => $fichemedicale,
                'users' => $users,
                'congelateur' => $congelateur
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
			
			$serologie->setUser1($this->getUser());
			
            
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
            
            if($serologie->getUser1()!=$this->getUser())
            {
                $serologie->setUser2($this->getUser());
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
         * @Route("/poche/mettre/a/jour/statut/poche/{id}" ,name="mettre_a_jour_statut")
        *  */

        public function mettreajourstatutpoche (Poche $poche,Request $request ,ObjectManager $manager){

            $formPocheEditStatut = $this->createForm(PocheEditStatutType::class,$poche);

            $formPocheEditStatut->handleRequest($request);
            
            if($formPocheEditStatut->isSubmitted() && $formPocheEditStatut->isValid() ){

                $historique = new HistoriquePoche();
                $historique->setPoche($poche);
                $historique->setTestDeCompatibilite($poche->getTestDeCompatibilite());
                $historique->setCongelateur($poche->getCongelateur()->getId());
                $historique->setUser($poche->getUser()->getId()); 
                $historique->setSession($poche->getSession());
                $historique->setRaison($poche->getRaison()); 
                $historique->setStatut($poche->getStatut()); 
                $historique->setDateAction($poche->getDateAction()); 
                $historique->setDemande($poche->getDemande());
                $historique->setAgentService($poche->getAgentService());
                
                $poche->setUser($this->getUser());
                $poche->setDateAction(new \DateTime());

                $manager->persist($historique);

                $manager->persist($poche);
                $manager->flush();


                return $this->redirectToRoute('poche_edit',['id' => $poche->getId()]);

            }
            return $this->render('Poche/statut.html.twig',[
            'formPocheEditStatut' => $formPocheEditStatut->createView()
            ]);
        }

        /**  
         * @Route("/poche/new",name="poche_create")
         * @Route("/poche/{id}/edit",name="poche_edit")
        *  */

        public function formPoche (Poche $poche = null,Request $request ,ObjectManager $manager){
            if(!$poche){

                $request = Request::createFromGlobals();
                $search = $request->query->get('search');
                $em = $this->getDoctrine()->getManager();
                $tube=$em->getRepository(Tubes::class)->findOneBySomeField($search);
                if ($tube != null ){
                    $poche = new Poche();
                    $poche->setStatut("Poche en attente");
                }
                else{
                    return $this->redirectToRoute('tubes');
                }
            }
            if (!$poche->getId()){
                $poche->setDate(new \DateTime());
                $poche->setNOrdre($tube->getNOrdre());
                $poche->setCinDonneur($tube->getCinDonneur());
                $poche->setNomDonneur($tube->getNomDonneur());
                $poche->setPrenomDonneur($tube->getPrenomDonneur());

            }
            if ($poche->getStatut() == "Poche en stock ---> Poche sortie" || $poche->getStatut() == "Poche reservée ---> Poche sortie")
            {
                $poche->setCongelateur(null);
            }
            $poche->setUser($this->getUser());
            $poche->setDateAction(new \DateTime());
            if($poche->getstatut() == "Poche en attente"){

            $formPoche = $this->createFormBuilder($poche)

                
                    ->add('type',ChoiceType::class, [
                        'choices' =>[   'CG' => 'CG',
                                        'ST' => 'ST', 
                                        'Plasma' => 'Plasma'
                                    ],
                    ])
                    ->add('congelateur', EntityType::class , [
                        'class' => Congelateur::class,
                        'choice_label' => function ($congelateur) {
                            if ($congelateur->getExiste ()=="oui")
                            return $congelateur->getType().' '.$congelateur->getNumCong();
                        }
                    ])
                    ->getForm();
            }
    
            elseif($poche->getstatut() == "Poche en attente ---> Poche en stock"){
                $formPoche = $this->createFormBuilder($poche)

                ->add('a_utiliser_avant',DateTimeType::class)
                ->add('groupe_sanguin',TextType::class)
                ->add('congelateur', EntityType::class , [
                    'class' => Congelateur::class,
                    'choice_label' => function ($congelateur) {
                        if ($congelateur->getExiste()=="oui")
                        return $congelateur->getType().' '.$congelateur->getNumCong();
                        }
                    ])
                ->getForm();
            }
            elseif($poche->getstatut() == "Poche en attente ---> Poche perimée" || $poche->getstatut() == "Poche en stock ---> Poche perimée" || $poche->getstatut() == "Poche reservée ---> Poche en stock")    
            {
                $formPoche = $this->createFormBuilder($poche)

                ->add('session',TextType::class)
                ->add('raison',TextType::class)
        
                ->add('congelateur', EntityType::class , [
                    'class' => Congelateur::class,
                    'choice_label' => function ($congelateur) {
                        if ($congelateur->getExiste()=="oui")
                        return $congelateur->getType().' '.$congelateur->getNumCong();
                        }
                    ])
                    ->getForm();
            }
            elseif($poche->getstatut() == "Poche en stock ---> Poche sortie" || $poche->getstatut() == "Poche reservée ---> Poche sortie" || $poche->getstatut() == "Poche sortie ---> Poche en stock" || $poche->getstatut() == "Poche sortie ---> Poche perimée")    
            {
                $formPoche = $this->createFormBuilder($poche)

                ->add('session',TextType::class)
                ->add('raison',TextType::class)
                ->add('agent_service',TextType::class)
                ->getForm();
            }
            elseif($poche->getstatut() == "Poche en stock ---> Poche reservée")
            {
                $formPoche = $this->createFormBuilder($poche)

                ->add('demande', NumberType::class)
                ->add('test_de_compatibilite', NumberType::class)
                ->add('congelateur', EntityType::class , [
                    'class' => Congelateur::class,
                    'choice_label' => function ($congelateur) {
                        if ($congelateur->getExiste()=="oui")
                        return $congelateur->getType().' '.$congelateur->getNumCong();
                        }
                    ])
                ->getForm();
            }

            $formPoche->handleRequest($request);
            if ($formPoche->isSubmitted() && $formPoche->isValid()) {

                
                $manager->persist($poche);
                $manager->flush();

                if($poche->getStatut() === "Poche en attente"){
                    return $this->redirectToRoute('tubes');
                }
        
                else {
                    return $this->redirectToRoute('poches');
                }
            }            
            return $this->render('poche/create.html.twig',[
            'formPoche' => $formPoche->createView(),
            'editMode' =>$poche->getId()!==null,
            'poche' =>$poche
            ]);
        }
        /**
         * @Route("/poches", name="poches")
         */
        public function poches()
        {
            $repo1=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo1->findAllPoches();
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
            $repo3=$this->getDoctrine()->getRepository(User::class);
            $users= $repo3->findAll();
            return $this->render('poche/pocheenstock.html.twig', [
                'controller_name' => 'PocheController',
                'poches'=>$poches,
                'congelateur' => $congelateur,
                'users' => $users
            ]);
        }
        
        /**
         * @Route("/poches/en/attente", name="poches_en_attente")
         */
        public function poches_en_attente()
        {
            $repo1=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo1->findAllPoches();
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
            $repo3=$this->getDoctrine()->getRepository(User::class);
            $users= $repo3->findAll();
            return $this->render('poche/pocheenattente.html.twig',[
                'controller_name' => 'PocheController',
                'poches'=>$poches,
                'congelateur' => $congelateur,
                'users' => $users
            ]);
        }        
        /**
         * @Route("/poches/cg", name="poches_cg")
         */
        public function poches_cg()
        {
            $repo1=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo1->findAllPoches();
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
            $repo3=$this->getDoctrine()->getRepository(User::class);
            $users= $repo3->findAll();
            return $this->render('poche/pochecg.html.twig', [
                'controller_name' => 'PocheController',
                'poches'=>$poches,
                'congelateur' => $congelateur,
                'users' => $users
            ]);
        } 

        /**
         * @Route("/poches/plasma", name="poches_plasma")
         */
        public function poches_plasma()
        {
            $repo1=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo1->findAllPoches();
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
            $repo3=$this->getDoctrine()->getRepository(User::class);
            $users= $repo3->findAll();
            return $this->render('poche/pocheplasma.html.twig', [
                'controller_name' => 'PocheController',
                'poches'=>$poches,
                'congelateur' => $congelateur,
                'users' => $users
            ]);
        } 

        /**
         * @Route("/poches/st", name="poches_st")
         */
        public function poches_st()
        {
            $repo1=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo1->findAllPoches();
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
            $poches= $repo1->findAllPoches();
            $repo3=$this->getDoctrine()->getRepository(User::class);
            $users= $repo3->findAll();
            return $this->render('poche/pochest.html.twig', [
                'controller_name' => 'PocheController',
                'poches'=>$poches,
                'congelateur' => $congelateur,
                'users' => $users
            ]);
        } 
        
                /**
         * @Route("/poches/reservees", name="reservee")
         */
        public function poches_reservee()
        {
            $repo1=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo1->findAllPoches();
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
            $poches= $repo1->findAllPoches();
            $repo3=$this->getDoctrine()->getRepository(User::class);
            $users= $repo3->findAll();
            return $this->render('poche/pochereservee.html.twig', [
                'controller_name' => 'PocheController',
                'poches'=>$poches,
                'congelateur' => $congelateur,
                'users' => $users
            ]);
        } 
        /**
         * @Route("/poche/en/stock/new", name="poche_en_stock_new")
         */
        public function createpocheentree(Request $request ,ObjectManager $manager)
        {
            
            $poche = new Poche();
            $poche->setStatut("Poche en stock");
            $poche->setUser($this->getUser());
            $poche->setDateAction(new \DateTime());
            $poche->setDate(new \DateTime());

            $formPoche = $this->createFormBuilder($poche)

                ->add('a_utiliser_avant',DateTimeType::class)
                ->add('groupe_sanguin',TextType::class)
                ->add('type',ChoiceType::class, [
                    'choices' =>[   'CG' => 'CG',
                                    'ST' => 'ST', 
                                    'Plasma' => 'Plasma'
                                ],
                    ])
                ->add('congelateur', EntityType::class , [
                    'class' => Congelateur::class,
                    'choice_label' => function ($congelateur) {
                        if ($congelateur->getExiste()=="oui")
                        return $congelateur->getType().' '.$congelateur->getNumCong();
                        }
                    ])
                ->add('n_ordre', NumberType::class )
                ->add('NomDonneur',TextType::class, ['label' => 'Nom du donneur'])
                ->add('PrenomDonneur',TextType::class, ['label' => 'Prenom du donneur'])
                ->add('CinDonneur',NumberType::class, ['label' => 'N°cin du donneur'], ['attr' => ['maxlength' => 8]])
                
                ->getForm();
                $formPoche->handleRequest($request);
                if ($formPoche->isSubmitted() && $formPoche->isValid()) {
    
                    $manager->persist($poche);
                    $manager->flush();
                    return $this->redirectToRoute('poches');
                    
                }
            
            return $this->render('poche/pochecreate.html.twig', [
                'controller_name' => 'PocheController',
                'formPoche' => $formPoche->createView(),
            ]);
        } 

        /**
        * @Route("/poche/show/{id}", name="poche") 
        */
        public function Poche($id)
        {
            $fichemedicale =null;
            $donneur = null;
            $serologie = null;
            

            $em = $this->getDoctrine()->getManager();
            
            $poche=$em->getRepository(Poche::class)->find($id);
            $historique=$em->getRepository(HistoriquePoche::class)->findBySomeField($id);
            $serologies=$em->getRepository(Serologie::class)->findByExampleField($poche->getNOrdre());
            $fichemedicale=$em->getRepository(FicheDeDonneurDeSang::class)->findByExampleField($poche->getNOrdre());
            if ($fichemedicale != null){
                $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($fichemedicale->getNumeroCIN());
            }
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
    
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();

            return $this->render('poche/poche.html.twig', [
                'controller_name' => 'PocheController',
                'poche'=> $poche,
                'donneur'=> $donneur,
                'historique' => $historique,
                'serologies'=> $serologies,
                'fichemedicale' => $fichemedicale,
                'users' => $users,
                'congelateur' => $congelateur
            ]);
        }
        /**
         * @Route("/poche/tc/new/{id}", name="test_compatibilite_new")
         */
        public function createTC(Poche $poche, Request $request ,ObjectManager $manager)
        {
            
            $tc = new TestDeCompatibilite();
            $tc->setUser($this->getUser());
            $tc->setDate(new \DateTime());
            $tc->setPoche($poche);
            $formtc = $this->createFormBuilder($tc)

                ->add('resultat',ChoiceType::class, [
                    'choices' =>[   'test +' => 'test +',
                                    'test -' => 'test -', 
                                ],
                    ])
                ->getForm();
                $formtc->handleRequest($request);
                if ($formtc->isSubmitted() && $formtc->isValid()) {
    
                    $manager->persist($tc);
                    $manager->flush();
                    return $this->redirectToRoute('show_tc');
                    
                }
            
            return $this->render('poche/testcreate.html.twig', [
                'controller_name' => 'PocheController',
                'formtc' => $formtc->createView(),
            ]);
        } 
       
        /**
        * @Route("/tc/show/{id}", name="show_tc")
        */
        public function showtc (Poche $poche){

            $repo=$this->getDoctrine()->getRepository(TestDeCompatibilite::class);
            $testCompatibilite= $repo->findByExampleField($poche);
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
                return $this->render('poche/testcompatibilite.html.twig', [
                    'controller_name' => 'PocheController',
                    'testCompatibilite'=> $testCompatibilite,
                    'users' => $users,
                    'poche' => $poche
                ]);
            }

    /**
         * @Route("/gestion/poche", name="gestion_stock")
         */
        public function gestionpoche(Request $request ,ObjectManager $manager)
        {
            
            $gestion = new GestionStock();
            $gestion->setUser($this->getUser());
            $gestion->setDate(new \DateTime());

            $repo=$this->getDoctrine()->getRepository(Poche::class);
            $poche= $repo->findAll();
            
            $i = 0; $e = 0; $s = 0; $t = 0;
            
            if ($i == 0){
                foreach($poche as $p){
                    if ($p->getStatut() == "Poche en attente ---> Poche en stock" || $p->getStatut() == "Poche sortie ---> Poche en stock" || $p->getStatut() == "Poche en stock" || $p->getStatut() == "Poche reservée ---> Poche en stock"){
                        $t = $t + 1 ;
                        if ($p->getGroupeSanguins() == "A+" && $p->getDateAct() == Date('d/m/y')){$gestion->setEAPositive(1); $e = $e + 1 ;}
                        if ($p->getGroupeSanguins() == "A-" && $p->getDateAct() == Date('d/m/y')){$gestion->setEANegative(1); $e = $e + 1 ;}
                        if ($p->getGroupeSanguins() == "B+" && $p->getDateAct() == Date('d/m/y')){$gestion->setEBPositive(1); $e = $e + 1 ;}
                        if ($p->getGroupeSanguins() == "B-" && $p->getDateAct() == Date('d/m/y')){$gestion->setEBNegative(1); $e = $e+ 1 ;}
                        if ($p->getGroupeSanguins() == "AB+" && $p->getDateAct() == Date('d/m/y')){$gestion->setEABPositive(1); $e = $e + 1 ;}
                        if ($p->getGroupeSanguins() == "AB-" && $p->getDateAct() == Date('d/m/y')){$gestion->setEABNegative(1); $e = $e + 1 ;}
                        if ($p->getGroupeSanguins() == "O+" && $p->getDateAct() == Date('d/m/y')){$gestion->setEOPositive(1); $e = $e + 1 ;}
                        if ($p->getGroupeSanguins() == "O-" && $p->getDateAct() == Date('d/m/y')){$gestion->setEONegative(1); $e = $e + 1 ;}
                    }
                    if ($p->getStatut() == "Poche en stock ---> Poche sortie" || $p->getStatut() == "Poche reservée ---> Poche sortie"){
                        if ($p->getGroupeSanguins() == "A+" && $p->getDateAct() == Date('d/m/y')){$gestion->setSAPositive(1); $s = $s + 1 ;}
                        if ($p->getGroupeSanguins() == "A-" && $p->getDateAct() == Date('d/m/y')){$gestion->setSANegative(1); $s = $s + 1 ;}
                        if ($p->getGroupeSanguins() == "B+" && $p->getDateAct() == Date('d/m/y')){$gestion->setSBPositive(1); $s = $s + 1 ;}
                        if ($p->getGroupeSanguins() == "B-" && $p->getDateAct() == Date('d/m/y')){$gestion->setSBNegative(1); $s = $s+ 1 ;}
                        if ($p->getGroupeSanguins() == "AB+" && $p->getDateAct() == Date('d/m/y')){$gestion->setSABPositive(1); $s = $s + 1 ;}
                        if ($p->getGroupeSanguins() == "AB-" && $p->getDateAct() == Date('d/m/y')){$gestion->setSABNegative(1); $s = $s + 1 ;}
                        if ($p->getGroupeSanguins() == "O+" && $p->getDateAct() == Date('d/m/y')){$gestion->setSOPositive(1); $se = $s + 1 ;}
                        if ($p->getGroupeSanguins() == "O-" && $p->getDateAct() == Date('d/m/y')){$gestion->setSONegative(1); $s = $s + 1 ;}
                    }
                }

                $gestion->setEStock($e);
                $gestion->setSStock($s);
                
                $gestion->setStockTotal($t);

                $i = 1;
            }
            if ($i == 1)
            {
                $manager->persist($gestion);
                $manager->flush();
                return $this->redirectToRoute('gestion');
            }
            
            return $this->render('poche/gestionstock.html.twig', [
                'controller_name' => 'PocheController']);
        }    
        
        /**
        * @Route("/gestion", name="gestion")
        */
        public function gestion (){

            $repo=$this->getDoctrine()->getRepository(GestionStock::class);
            $gestion = $repo->findAllGS();
            $repo=$this->getDoctrine()->getRepository(User::class);
            $users= $repo->findAll();
                return $this->render('poche/gestionstock.html.twig', [
                    'controller_name' => 'PocheController',
                    'gestion'=> $gestion,
                    'users' => $users
                ]);
        }

        /**
        * @Route("/alertes", name="alertes")
        */
        public function aleretes()
        {
            $repo=$this->getDoctrine()->getRepository(Alertes::class);
            $alertes = $repo->findAllAlertes();
            $repo=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo->findAll();
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
                return $this->render('poche/alertes.html.twig', [
                    'controller_name' => 'PocheController',
                    'alertes'=> $alertes,
                    'poches' => $poches,
                    'congelateur' => $congelateur
                ]);
        }

        /**
        * @Route("/alertes/gestion", name="alertes-gestion")
        */
        public function aleretes_gestion(Request $request ,ObjectManager $manager)
        {
            $alerte = New Alertes();
            $repo=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo->findAll();
            $repo=$this->getDoctrine()->getRepository(Alertes::class);
            $alertes= $repo->findAllAlertes();

            foreach ($poches as $poche){
                if ($poche->getStatut() == "Poche en attente ---> Poche en stock" || $poche->getStatut() == "Poche sortie ---> Poche en stock" || $poche->getStatut() == "Poche en stock" || $poche->getStatut() == "Poche reservée ---> Poche en stock"|| $poche->getStatut() == "Poche en stock ---> Poche reservée")
                    {
                        $interval = date_diff($poche->getDate() , $poche->getAUtiliserAvant());
                        if ($interval->format('%d jours') == "7 jours" || $interval->format('%d jours') == "6 jours" || $interval->format('%d jours') == "5 jours" || $interval->format('%d jours') == "4 jours" || $interval->format('%d jours') == "3 jours" || $interval->format('%d jours') == "2 jours" || $interval->format('%d jours') == "1 jours" || $interval->format('%d jours') == "0 jours")
                        {   $alerte->setDate(new \DateTime());
                            $alerte->setPoche($poche);
                            $manager->persist($alerte);
                            $manager->flush();
                        }
                    }

            }                 return $this->redirectToRoute('alertes');

                return $this->render('poche/alertes.html.twig', [
                    'controller_name' => 'PocheController',
                    'alertes'=> $alertes,
                    'poches' => $poches
                ]);
        }


        /**
        * @Route("/poche", name="search_poche_enstock") 
        * */
        public function search_Poche()
        {
            
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');

            $em = $this->getDoctrine()->getManager();
            
            $poches =$em->getRepository(Poche::class)->findByExampleField($search);
            $repo2=$this->getDoctrine()->getRepository(Congelateur::class);
            $congelateur= $repo2->findAll();
            
            return $this->render('poche/pocheenstock.html.twig', [
                'controller_name' => 'PocheController',
                'poches'=> $poches,
                'congelateur' => $congelateur
            ]);
        }

        /**
        * @Route("/historique", name="historique")
        */
        public function historique()
        {
            $repo=$this->getDoctrine()->getRepository(HistoriquePoche::class);
            $historique = $repo->findAll();
            $repo=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo->findAll();
            $repo3=$this->getDoctrine()->getRepository(User::class);
            $users= $repo3->findAll();
                return $this->render('poche/historique.html.twig', [
                    'controller_name' => 'PocheController',
                    'users'=> $users,
                    'poches' => $poches,
                    'historique' => $historique
                ]);
        }
     /**
     * @Route("/serologie/termnier/{id}", name="tserologie_terminee") 
     * */
    public function terminerserologie(Serologie $serologie, Request $request,ObjectManager $manager ){

        $request = Request::createFromGlobals();

        $em = $this->getDoctrine()->getManager();
        $s=$em->getRepository(Serologie::class)->ModifierStatut($serologie->getId(),0); 

        $repo=$this->getDoctrine()->getRepository(User::class);
        $users= $repo->findAll();

        return $this->redirectToRoute('show_serologie',['id'=>$serologie->getId()]);

            return $this->render('technicienlabo/serologie/serologie.html.twig', [
                'controller_name' => 'PocheController',
                'serologie'=>$serologie,
                'users' => $users,
            ]);
        
} 
        
        /**
        * @Route("/historique/poche", name="search_historique") 
        * */
        public function search_historique()
        {
            
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');

            $em = $this->getDoctrine()->getManager();
            
            $historique =$em->getRepository(HistoriquePoche::class)->findByExampleField($search);
            $repo=$this->getDoctrine()->getRepository(Poche::class);
            $poches= $repo->findAll();
            $repo2=$this->getDoctrine()->getRepository(User::class);
            $users= $repo2->findAll();
            return $this->render('poche/historique.html.twig', [
                'controller_name' => 'PocheController',
                'historique'=> $historique,
                'users' => $users,
                'poches' => $poches
            ]);
        }
}

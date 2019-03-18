<?php

namespace App\Controller;

use App\Form\DemandeSangType;
use App\Entity\DemandeSang;

use App\Entity\User;
use App\Entity\Service;
use App\Entity\PocheEntree;

use App\Form\PocheReserveeType;
use App\Entity\PocheReservee;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

class DemandeController extends AbstractController
{
    /**
     * @Route("/demandes", name="demandes")
     */
    public function ShowAllDemande()
    {
        $repo1=$this->getDoctrine()->getRepository(DemandeSang::class);
        $demandes= $repo1->findAll();

        $repo2= $this->getDoctrine()->getRepository(User::class);
        $users= $repo2->findAll();

        $repo3= $this->getDoctrine()->getRepository(Service::class);
        $services= $repo3->findAll();

        return $this->render('demande/showAll.html.twig', [
            'controller_name' => 'DemandeController',
            'demandes'=>$demandes,
            'users'=>$users,
            'services'=>$services
        ]);
    }
    
    /**
     * @Route("/demande/new", name="demande_new")
     * @Route("/demande/{id}/edit",name="demande_edit")
     */
    public function CreateDemande(DemandeSang $demande = NULL ,Request $request ,ObjectManager $manager)
    {
        if (!$demande)
        {
            $demande = new DemandeSang();
        }

        $formDemande = $this->createForm(DemandeSangType::class,$demande);

        $formDemande->handleRequest($request);

        if($formDemande->isSubmitted() && $formDemande->isValid() ){
            
            $demande->setDateDemande(new \DateTime());
            $demande->setIdUser1($this->getUser()->getId());
            $demande->setReponse("inexiste");

            $manager->persist($demande);
            $manager->flush();
            return $this->redirectToRoute('demandes');

        }

        return $this->render('demande/create.html.twig', [
            'controller_name' => 'DemandeController',
            'formDemande' => $formDemande->createView(),
            'editMode' =>$demande->getId()!==null,
        ]);
    }
    /**
     * @Route("/demande/{id}/valide", name="demande_valide")
     */
    public function ValideDemande(DemandeSang $demande ,Request $request ,ObjectManager $manager)
    {

            $demande->setIdUser2($this->getUser()->getId());
  
            $manager->persist($demande);
            $manager->flush();


        return $this->redirectToRoute('demandes');

        return $this->render('demande/create.html.twig', [
            'controller_name' => 'DemandeController',
        ]);
    }
        /**
        * @Route("/demande/search", name="search_demande") 
        * */
        public function SearchDemande()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');

            $em = $this->getDoctrine()->getManager();
            
            $demandes=$em->getRepository(DemandeSang::class)->findByExampleField($search);

            $repo1=$this->getDoctrine()->getRepository(User::class);
            $users= $repo1->findAll();
            $repo2=$this->getDoctrine()->getRepository(Service::class);
            $services= $repo2->findAll();
            

            return $this->render('demande/showAll.html.twig', [
                'controller_name' => 'DemandeController',
                'demandes'=> $demandes,
                'users'=> $users,
                'services' => $services,

            ]);
        }
    /**
     * @Route("/demande/{id}/delete", name="demande_delete") 
     * */
    public function delete (Request $request ,$id ){

        $demande=$this->getDoctrine()->getRepository(DemandeSang::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($demande);
        $entityManager->flush();

       

        return $this->redirectToRoute('demandes');
        return $this->render('demande/showAll.html.twig');
    }
    /**
     * @Route("/demande/{id}/reponse", name="demande_reponse") 
     * */
    public function reponse (Request $request ,ObjectManager $manager,$id){
        
        $demande=$this->getDoctrine()->getRepository(DemandeSang::class)->find($id);

        $pochereservee = new PocheReservee();
        $FormPocheReservee = $this->createForm(PocheReserveeType::class,$pochereservee);

        $FormPocheReservee->handleRequest($request);

        if($FormPocheReservee->isSubmitted() && $FormPocheReservee->isValid() ){
            
            $pochereservee->setDate(new \DateTime());
            $pochereservee->setUser($this->getUser());
            $pochereservee->setDemande($demande);

            $manager->persist($pochereservee);
            $manager->flush();

            $em = $this->getDoctrine()->getManager();
            $pocheentree=$em->getRepository(PocheEntree::class)->ModifierStatut($pochereservee->getNOrdre(),0,$demande->getType());

            return $this->redirectToRoute('demandes');

        }

        return $this->render('technicienlabo/pochereservee/create.html.twig', [
            'controller_name' => 'DemandeController',
            'FormPocheReservee' => $FormPocheReservee->createView(),
        ]);

        return $this->redirectToRoute('demandes');
        return $this->render('demande/showAll.html.twig');
    }

    /**
     * @Route("/demande/{id}/envoyer", name="reponse_envoyee") 
     * */
    public function EnvoyerReponse (Request $request ,$id ){

        $em = $this->getDoctrine()->getManager();
        $DemandeReponse=$em->getRepository(DemandeSang::class)->ModifierReponse($id);


        return $this->redirectToRoute('demandes');
        return $this->render('demande/showAll.html.twig');
    }

    /**
     * @Route("/demande/{id}/show", name="demande_show") 
     * */
    public function show (Request $request ,$id ){

        $em = $this->getDoctrine()->getManager();

        $demande=$em->getRepository(DemandeSang::class)->find($id);
        $pochesreservees=$em->getRepository(PocheReservee::class)->findByExampleField($id);

        $repo= $this->getDoctrine()->getRepository(User::class);
        $users= $repo->findAll();

        $repo1= $this->getDoctrine()->getRepository(Service::class);
        $services= $repo1->findAll();

        return $this->render('demande/show.html.twig', [
            'controller_name' => 'DemandeController',
            'demande'=> $demande,
            'users'=> $users,
            'services' => $services,
            'pochesreservees'=> $pochesreservees
        ]);
    }
}

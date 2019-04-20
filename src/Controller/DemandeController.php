<?php

namespace App\Controller;

use App\Form\DemandeSangType;
use App\Entity\DemandeSang;
use App\Entity\Feedback;

use App\Entity\User;
use App\Entity\Service;
use App\Entity\Malade;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
        $repo4=$this->getDoctrine()->getRepository(Malade::class);
        $malades= $repo4->findAll();
        $repo2= $this->getDoctrine()->getRepository(User::class);
        $users= $repo2->findAll();

        $repo3= $this->getDoctrine()->getRepository(Service::class);
        $services= $repo3->findAll();

        return $this->render('demande/showAll.html.twig', [
            'controller_name' => 'DemandeController',
            'demandes'=>$demandes,
            'users'=>$users,
            'malades' => $malades,
            'services'=>$services
        ]);
    }
    
    /**
     * @Route("/demande/new/{id}", name="demande_new")

     */
    public function CreateDemande(DemandeSang $demande = NULL,Malade $malade ,Request $request ,ObjectManager $manager)
    {
        if (!$demande)
        {
            $demande = new DemandeSang();
        }

        $formDemande = $this->createForm(DemandeSangType::class,$demande);

        $formDemande->handleRequest($request);

        if($formDemande->isSubmitted() && $formDemande->isValid() ){
            
            $demande->setDateDemande(new \DateTime());
            $demande->setUser1($this->getUser());
            $demande->setReponse(" ");
            $demande->setMalade($malade);
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

            $demande->setUser2($this->getUser());
  
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
            $repo3=$this->getDoctrine()->getRepository(Malade::class);
            $malades= $repo3->findAll();

            return $this->render('demande/showAll.html.twig', [
                'controller_name' => 'DemandeController',
                'demandes'=> $demandes,
                'users'=> $users,
                'malades' => $malades,
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
        
        $formDemande = $this->createFormBuilder($demande)

            ->add('reponse',TextType::class)
            
            ->getForm();
            $formDemande->handleRequest($request);

            if ($formDemande->isSubmitted() && $formDemande->isValid()) {

                $manager->persist($demande);
                $manager->flush();
                
                return $this->redirectToRoute('demandes');
                
            }

        
        return $this->render('demande/reponse.html.twig', [
            'controller_name' => 'DemandeController',
            'formDemande' => $formDemande->createView(),
        ]);

    }

    /**
     * @Route("/demande/{id}/show", name="demande_show") 
     * */
    public function show (Request $request ,$id ){

        $em = $this->getDoctrine()->getManager();

        $demande=$em->getRepository(DemandeSang::class)->find($id);

        $repo= $this->getDoctrine()->getRepository(User::class);
        $users= $repo->findAll();
        
        $repo1= $this->getDoctrine()->getRepository(Service::class);
        $services= $repo1->findAll();
        $repo2 = $this->getDoctrine()->getRepository(Feedback::class);
        $feedbacks= $repo2->findAll();
        $repo3= $this->getDoctrine()->getRepository(Malade::class);
        $malades= $repo3->findAll();
        return $this->render('demande/show.html.twig', [
            'controller_name' => 'DemandeController',
            'demande'=> $demande,
            'users'=> $users,
            'feedbacks' => $feedbacks,
            'malades' => $malades,
            'services' => $services
        ]);
    }

    /**
     * @Route("/demande/{id}/feedback",name="feedback_new")
     */
    public function Createfeedback(DemandeSang $demande,Request $request ,ObjectManager $manager)
    {
        $em = $this->getDoctrine()->getManager();

        $demande=$em->getRepository(DemandeSang::class)->find($demande->getId());

        $fb = new Feedback();
        $fb->setUser($this->getUser());
        $fb->setDate(new \DateTime());
        $fb->setDemande($demande);
        $formfb = $this->createFormBuilder($fb)

            ->add('feedback',TextareaType::class)
            ->getForm();
            $formfb->handleRequest($request);
            if ($formfb->isSubmitted() && $formfb->isValid()) {

                $manager->persist($fb);
                $manager->flush();
                return $this->redirectToRoute('feedback_new',['id' => $demande->getId()]);
                
            }
        $repo= $this->getDoctrine()->getRepository(User::class);
        $users= $repo->findAll();
        
        $repo1= $this->getDoctrine()->getRepository(Service::class);
        $services= $repo1->findAll();
        $repo2= $this->getDoctrine()->getRepository(Feedback::class);
        $feedbacks= $repo2->findAll();
        $repo3= $this->getDoctrine()->getRepository(Malade::class);
        $malades= $repo3->findAll();
        return $this->render('demande/show.html.twig', [
            'controller_name' => 'DemandeController',
            'demande'=> $demande,
            'formfb' => $formfb->createView(),
            'users'=> $users,
            'feedbacks' => $feedbacks,
            'malades' => $malades,
            'services' => $services
        ]);
    }


    /**
     * @Route("/demande/{id}/edit/{id_malade}",name="demande_edit")
     */
    public function EditDemande(DemandeSang $demande,$id_malade ,Request $request ,ObjectManager $manager)
    {
       
        $repo= $this->getDoctrine()->getRepository(Malade::class);
        $malade= $repo->find($id_malade);
        $formDemande = $this->createForm(DemandeSangType::class,$demande);

        $formDemande->handleRequest($request);

        if($formDemande->isSubmitted() && $formDemande->isValid() ){
            
            $demande->setDateDemande(new \DateTime());
            $demande->setUser1($this->getUser());
            $demande->setReponse(" ");
            $demande->setMalade($malade);
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
}

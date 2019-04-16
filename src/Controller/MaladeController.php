<?php

namespace App\Controller;

use App\Form\MaladeType;
use App\Entity\Malade;
use App\Entity\Service;
use App\Entity\DemandeSang;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class MaladeController extends AbstractController
{
    
    /**  
     * @Route("/malade/create",name="malade_create")
    */

    public function form (Request $request ,ObjectManager $manager){
                  
        
        $malade= new Malade();

        $form = $this->createForm(MaladeType::class, $malade);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid() ){
            $manager->persist($malade);
            $manager->flush();
            return $this->redirectToRoute('malades');
        }
        return $this->render('malade/create.html.twig', [
            'form' => $form->createView()
        ]);
   
    }
        /**
         * @Route("/malades", name="malades")
         */
        public function malades()
        {
            $repo=$this->getDoctrine()->getRepository(Malade::class);
            $malades= $repo->findAll();

            $repo3= $this->getDoctrine()->getRepository(Service::class);
            $services= $repo3->findAll();

            return $this->render('malade/malades.html.twig', [
                'controller_name' => 'MaladeController',
                'malades'=>$malades,
                'services' => $services
            ]);
        }

        /**
        * @Route("/malade/search", name="search_malade") 
        * */
        public function searchMalade()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');

            $em = $this->getDoctrine()->getManager();
            $malades=$em->getRepository(Malade::class)->findByExampleField($search);

            $repo3= $this->getDoctrine()->getRepository(Service::class);
            $services= $repo3->findAll();

            return $this->render('malade/malades.html.twig', [
                'controller_name' => 'MaladeController',
                'malades'=>$malades,
                'services' => $services
            ]);

        }

                /**
         * @Route("/malade/show/{id}", name="malade_show")
         */
        public function show($id)
        {
            $repo=$this->getDoctrine()->getRepository(Malade::class);
            $malade= $repo->find($id);

            $repo1=$this->getDoctrine()->getRepository(DemandeSang::class);
            $demandes= $repo1->findAll();
    
            $repo2= $this->getDoctrine()->getRepository(User::class);
            $users= $repo2->findAll();
    
            $repo3= $this->getDoctrine()->getRepository(Service::class);
            $services= $repo3->findAll();
 
            return $this->render('malade/malade.html.twig', [
                'controller_name' => 'MaladeController',
                'malade'=>$malade,
                'demandes'=>$demandes,
                'users'=>$users,
                'services'=>$services
            ]);
        }
}

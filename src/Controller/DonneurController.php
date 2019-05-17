<?php

namespace App\Controller;
use App\Entity\Donneur;
use App\Form\DonneurType;
use App\Form\DonneurEditType;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;





use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;



class DonneurController extends AbstractController
{


    /**
     * @Route("/donneur/show/{id}", name="show_donneur")
     */
        public function ShowDonneur($id)
        {
            $repo2=$this->getDoctrine()->getRepository(Donneur::class);
            $donneur= $repo2->find($id);
            $em = $this->getDoctrine()->getManager();
            $user=$em->getRepository(User::class)->findOne($donneur->getUser());

 
            return $this->render('donneur/showDonneur.html.twig', [
                'controller_name' => 'DonneurController',
                'donneur'=>$donneur,
                'user' => $user
            ]);
        }
     
    /**
     * @Route("/donneurs", name="don_donneur")
     */
    public function donneur()
    {
        $repo=$this->getDoctrine()->getRepository(Donneur::class);

        $donneurs= $repo->findAll();

        return $this->render('donneur/donneur.html.twig', [
            'controller_name' => 'DonneurController',
            'donneurs'=>$donneurs
        ]);
    }

     /**
      * @Route ("/donneur" , name="donneur_show")
      */
      public function show(){
          return $this->render('donneur/show.html.twig');
      }
 
        /**
        * @Route("/donneur/search", name="search_donneur") 
        * */
        public function searchDonneur()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');


            $em = $this->getDoctrine()->getManager();
            $donneur=$em->getRepository(Donneur::class)->findOneBySomeField($search);
            $user=$em->getRepository(User::class)->findOne($this->getUser());

 
            return $this->render('donneur/showDonneur.html.twig', [
                'controller_name' => 'DonneurController',
                'donneur'=>$donneur,
                'user' => $user
            ]);
        }
        /**  
         * @Route("/donneur/new",name="donneur_create")
         *@Route("/donneur/{id}/edit",name="donneur_edit")
        **/

        public function formDonneur (Donneur $donneur=null,Request $request ,ObjectManager $manager){
            if(!$donneur){
                $donneur = new Donneur();
                $formDonneur = $this->createForm(DonneurType::class,$donneur);

            }
            else{
                $formDonneur = $this->createForm(DonneurEditType::class,$donneur);
            }

            $formDonneur->handleRequest($request);

            if($formDonneur->isSubmitted() && $formDonneur->isValid() ){
                    
                $donneur->setDonvalide("En Attent");
                $donneur->setUser($this->getUser());

                $manager->persist($donneur);
                $manager->flush();

                
                return $this->redirectToRoute('don_donneur');

            }
            return $this->render('donneur/create.html.twig',[
            'formDonneur' => $formDonneur->createView(),
            'editMode' =>$donneur->getId()!==null
            ]);
        }

        
}

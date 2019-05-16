<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;

use App\Repository\UserRepository;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Form\ProfilType;
use App\Form\MdpType;
use App\Form\CongelateurType;
use App\Entity\Congelateur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class BlogController extends AbstractController
{



    /**
     * @Route("/user", name="blog_user")
     */
    public function user()
    {
        $repo=$this->getDoctrine()->getRepository(User::class);

        $users= $repo->findAll();

        return $this->render('blog/user.html.twig', [
            'controller_name' => 'BlogController',
            'users'=>$users
        ]);
    }




    /**  
     *@Route("/user/create",name="user_create")
      *@Route("/user/{id}/update",name="user_update")
    */

    public function form (User $user =null ,Request $request ,ObjectManager $manager,UserPasswordEncoderInterface $encoder){
                  
        if ($user == null){
            $user= new User();
        }
        

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid() ){

            $hash = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('blog_user');
        }
        return $this->render('blog/create.html.twig', [
            'form' => $form->createView()
        ]);
   
    }

    
    /**
     * @Route("/user/{id}/delete", name="user_delete") 
     * */
    public function delete (Request $request,$id ){

        $user=$this->getDoctrine()->getRepository(User::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

       

        return $this->redirectToRoute('blog_user');
        return $this->render('blog/user.html.twig');
        }

    
        /**
         * @Route("/service", name="blog_service")
         */
        public function service()
        {
            $repo=$this->getDoctrine()->getRepository(Service::class);

            $services= $repo->findAll();

            return $this->render('blog/service.html.twig', [
                'controller_name' => 'BlogController',
                'services'=>$services
            ]);
        }

        /**  
         * @Route("/service/createSer",name="service_create")
         * @Route("/service/{id}/edit",name="service_edit")
        *  */

        public function formServ (Service $service=null,Request $request ,ObjectManager $manager){
            if(!$service){
                        $service = new Service();
            }

            $formServ = $this->createForm(ServiceType::class,$service);

            $formServ->handleRequest($request);
            
            if($formServ->isSubmitted() && $formServ->isValid() ){
                
                if (!$service->getId()){
                    $service->setDateCtSer(new \DateTime());
                    $service->setExiste("oui");
                }
                
                $manager->persist($service);
                $manager->flush();


                return $this->redirectToRoute('blog_service');

            }
            return $this->render('blog/createSer.html.twig',[
            'formServ' => $formServ->createView(),
            'editMode' =>$service->getId()!==null
            ]);
        }


        /**
        * @Route("/service/{id}/delete", name="service_delete") 
        * */
    public function deleteServ (Request $request,$id ){

        $service=$this->getDoctrine()->getRepository(Service::class)->find($id);

        $repo=$this->getDoctrine()->getRepository(Service::class);
        $service= $repo->UpdateExiste($id);

        

        return $this->redirectToRoute('blog_service');
        return $this->render('blog/service.html.twig');
        }

            
        /**
         * @Route("/congelateur", name="blog_congelateur")
         */
        public function Congelateur()
        {
            $repo=$this->getDoctrine()->getRepository(Congelateur::class);

            $congelateurs= $repo->findAll();

            return $this->render('blog/congelateur.html.twig', [
                'controller_name' => 'BlogController',
                'congelateurs'=>$congelateurs
            ]);
        }

        /**  
         * @Route("/congelateur/createCong",name="congelateur_create")
         * @Route("/congelateur/{id}/edit",name="congelateur_edit")
        *  */

        public function formCong (Congelateur $congelateur=null,Request $request ,ObjectManager $manager){
            if(!$congelateur){
                        $congelateur = new Congelateur();
            }

            $formCong = $this->createForm(CongelateurType::class,$congelateur);

            $formCong->handleRequest($request);
            
            if($formCong->isSubmitted() && $formCong->isValid() ){
                if (!$congelateur->getId()){
                    $congelateur->setDateCtCong(new \DateTime());
                    $congelateur->setExiste("oui");

                }
                $manager->persist($congelateur);
                $manager->flush();


                return $this->redirectToRoute('blog_congelateur');

            }
            return $this->render('blog/createCong.html.twig',[
            'formCong' => $formCong->createView(),
            'editMode' =>$congelateur->getId()!==null
            ]);
        }


        /**
        * @Route("/congelateur/{id}/delete", name="congelateur_delete") 
        * */
    public function deleteCong (Request $request,$id ){
                    
        $repo=$this->getDoctrine()->getRepository(Congelateur::class);
        $congelateur= $repo->UpdateExiste($id);
        return $this->redirectToRoute('blog_congelateur');


        return $this->render('blog/congelateur.html.twig');

    }    
 
        /**
        * @Route("/user/search", name="search_user") 
        * */
        public function searchUser()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');


            $em = $this->getDoctrine()->getManager();
            $users=$em->getRepository(User::class)->findByExampleField($search);

 
            return $this->render('blog/user.html.twig', [
                'controller_name' => 'BlogController',
                'users'=>$users
            ]);
        }
     
 
        /**
        * @Route("/congelateur/search", name="search_congelateur") 
        * */
        public function searchCongelateur()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');


            $em = $this->getDoctrine()->getManager();
            $congelateurs=$em->getRepository(Congelateur::class)->findByExampleField($search);

 
            return $this->render('blog/congelateur.html.twig', [
                'controller_name' => 'BlogController',
                'congelateurs'=>$congelateurs
            ]);
        }

        
        /**
        * @Route("/service/search", name="search_service") 
        * */
        public function searchService()
        {
            $request = Request::createFromGlobals();

            $search = $request->query->get('search');


            $em = $this->getDoctrine()->getManager();
            $services=$em->getRepository(service::class)->findByExampleField($search);

 
            return $this->render('blog/service.html.twig', [
                'controller_name' => 'BlogController',
                'services'=>$services
            ]);
        }

        
    /** 
      *@Route("/profil/{id}",name="profil")
     */

    public function profil (User $user,$id, Request $request ,ObjectManager $manager,UserPasswordEncoderInterface $encoder){
           
        $form = $this->createForm(ProfilType::class, $user);
        $mdp = $this->createForm(MdpType::class, $user);
        $u=$this->getDoctrine()->getRepository(User::class)->find($id);
        $form->handleRequest($request);
        $mdp->handleRequest($request);
        if($mdp->isSubmitted() && $mdp->isValid() ){

            $hash = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('profil',['id' => $user->getId()]);
        }
        if ($form->isSubmitted() && $form->isValid() ){
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('profil',['id' => $user->getId()]);
        }
        return $this->render('blog/profil.html.twig', [
            'form' => $form->createView(),
            'mdp' => $mdp->createView(),
            'u' => $u
        ]);
   
    }
}
<?php

namespace App\Controller;

use App\Entity\Recettes;
use App\Form\AddRecettesType;
use App\Repository\RecettesRepository;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
    #[Route('/add_recette', name: 'app_add_recettes')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $recettes = new Recettes();

        $formRecettes = $this->createForm(AddRecettesType::class, $recettes);

        $formRecettes->handleRequest($request);
        if ($formRecettes->isSubmitted() && $formRecettes->isValid()) {
            $manager->persist($recettes);
            $manager->flush();
            $this->addFlash(
                'notice',
                'Votre recette a bien été rajoutée'
            );
            return $this->redirectToRoute('app_is_connect');
        }

        
        return $this->render('admin/recettes.html.twig', [
            
            'formRecettes' => $formRecettes->createView()
        ]);
    }


    #[Route('/see_all_recette', name: 'app_voir_touts_les_recettes')]
    public function seeRecettes(RecettesRepository $repository): Response
    {
        $recettes = $repository->findAll();
        return $this->render('admin/list_recettes.html.twig', [
            "recettes" => $recettes
        ]);
    }


    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig',[
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }


    #[Route('/logout', name: 'app_logout')]
    public function logout(){
    }

    
}

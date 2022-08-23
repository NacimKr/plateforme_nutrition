<?php

namespace App\Controller;

use App\Repository\RecettesRepository;
use App\Repository\UtilisateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/qui_suis_je', name: 'app_qui_suis_je')]
    public function qui_suis_je(): Response
    {
        return $this->render('home/qui_suis_je.html.twig');
    }

    #[Route('/pour_qui_pour_quoi', name: 'app_pour_qui_pour_quoi')]
    public function pour_qui_pour_quoi(): Response
    {
        return $this->render('home/pour_qui_pour_quoi.html.twig');
    }

    #[Route('/prestations', name: 'app_prestations')]
    public function prestations(): Response
    {
        return $this->render('home/prestations.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }

    #[Route('/isConnect', name: 'app_is_connect')]
    public function isConnect(): Response
    {
        return $this->render('home/is_connect.html.twig');
    }

    #[Route('/isConnectUsers', name: 'app_is_connect_user')]
    public function isConnectUser(RecettesRepository $repositoryRecettes, UtilisateursRepository $repositoryUtilisateurs): Response
    {
        $recettes = $repositoryRecettes->findAll();
        $utilisateurs = $repositoryUtilisateurs->findAll();
        return $this->render('home/is_connect_user.html.twig', [
            "recettes" => $recettes,
            "utilisateurs" => $utilisateurs
        ]);
    }
}

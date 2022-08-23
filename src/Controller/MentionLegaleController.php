<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentionLegaleController extends AbstractController
{
    #[Route('/mention/legale', name: 'app_mention_legale')]
    public function index(): Response
    {
        return $this->render('mention_legale/index.html.twig', [
            'controller_name' => 'MentionLegaleController',
        ]);
    }

    #[Route('/politique/confidentialité', name: 'app_politique_confidentialité')]
    public function politique(): Response
    {
        return $this->render('mention_legale/politique.html.twig', [
            'controller_name' => 'MentionLegaleController',
        ]);
    }
}

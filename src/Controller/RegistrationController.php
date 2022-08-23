<?php

namespace App\Controller;

use App\Entity\Allergie;
use App\Entity\Users;
use App\Form\AllergieFormType;
use App\Form\RegistrationFormType;
use App\Repository\AllergieRepository;
use App\Repository\UsersRepository;
use App\Security\UsersAuthenticator;
use App\Security\UsersAuthenticator2Authenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, UsersRepository $repository): Response
    {
        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        // $allergie = new Allergie();
        // $formAllergie = $this->createForm(AllergieFormType::class, $allergie);
        
        // $user->setAllergie($allergie);

        // $formAllergie->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $this->addFlash(
                'notice',
                'Votre patient a bien été rajoutée'
            );

            $entityManager->persist($user);
            //$entityManager->persist($allergie);
            $entityManager->flush();
            // do anything else you need here, like send an email
            return $this->redirectToRoute('app_is_connect');

        }
        $users = $repository->findAll();
        return $this->render('registration/index.html.twig', [
            "users" => $users,
            'registrationForm' => $form->createView(),
            //'allergieForm' => $formAllergie->createView()
        ]);
    }
}

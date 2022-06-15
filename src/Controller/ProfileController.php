<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Security;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profil", name="app_profile")
     * @IsGranted("IS_AUTHENTICATED_REMEMBERED")
     */

    // Je protège la route en utilisant l'annotation IsGranted.
    // Each IsGranted() must grant access for the user to have access to the controller.
    public function index(Security $security): Response
    {
        $user = $security->getUser();
        // $lessons = 
        // Méthode fournie par la classe AbstractController
        // dump($user);
        // On ne peut accéder à cette page que si on est connecté en tant qu'utilisateur/ que si on a le rôle utilisateur
        return $this->render('profile/index.html.twig', [
            // 'controller_name' => 'ProfileController',
            'user' => $user
        ]);
        // On fait transiter la variable utilisateur dans l'URL
    }
    // Il faudrait ouvoir accéder à cette page quand étant connecté à un compte utilisateur
}

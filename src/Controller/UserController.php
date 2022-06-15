<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    #[Route('/teacher/{id}', name: 'teacher')]
    public function index(ManagerRegistry $doctrine, $id): Response
    {
        $repo = $doctrine->getRepository(User::class);
        $teacher = $repo->find($id);
        return $this->render('user/index.html.twig', [
            'teacher' => $teacher
        ]);
    }
}

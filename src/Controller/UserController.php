<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    // #[Route('/utilisateur/{id}', name: 'user')]
    // public function showUserDetails(ManagerRegistry $doctrine, $id): Response
    // {
    //     $repo = $doctrine->getRepository(User::class);
    //     $user = $repo->find($id);
    //     return $this->render('user/index.html.twig', [
    //         'user' => $user
    //     ]);
    // }

    #[Route('/professeur/{id}', name: 'teacher')]
    public function showTeacherDetails(ManagerRegistry $doctrine, $id): Response
    {
        $repo = $doctrine->getRepository(User::class);
        $teacher = $repo->find($id);
        return $this->render('teacher/prof.html.twig', ['teacher' => $teacher]);
    }
}

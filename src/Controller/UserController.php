<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/profil/{id}', name: 'profile')]
    #[Security("is_granted('USER')")]

    public function showUserDetails(ManagerRegistry $doctrine, $id): Response
    {
        $repo = $doctrine->getRepository(User::class);
        // $repo2 = $doctrine->getRepository(Article::class);
        // $article = $repo2->findBy([], ['date' => 'DESC']);
        $user = $repo->find($id);

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            // 'article' => $article
        ]);
    }


    #[Route('/professeur/{id}', name: 'teacher')]
    public function showTeacherDetails(ManagerRegistry $doctrine, $id): Response
    {
        $repo = $doctrine->getRepository(User::class);
        $teacher = $repo->find($id);
        return $this->render('teacher/prof.html.twig', ['teacher' => $teacher]);
    }
}

<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Article;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[
        Route(
            path: "/",
            name: "app_home"
        )
    ]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Article::class);
        $posts = $repository->findBy([], ['date' => 'DESC'], 3);
        return $this->render('home/index.html.twig', ['posts' => $posts]);
    }

    #[
        Route(
            path: '/a-propos',
            name: 'app_about'
        )
    ]

    public function about(ManagerRegistry $doctrine): Response
    {
        /** @var UserRepository */
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->findByRole("ROLE_ADMIN");
        // dd($users);
        return $this->render('home/about.html.twig', ['teachers' => $users]);
    }
    #[Route(
        path: '/confidentialite',
        name: 'app_confidentiality'
    )]

    public function confidentiality()
    {
        return $this->render('home/confidentialite.html.twig');
    }
    #[Route(
        path: '/mentions',
        name: 'app_mentions'
    )]

    public function mentions()
    {
        return $this->render('home/mentions.html.twig');
    }
}

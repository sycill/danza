<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[
        Route(
            path: "/",
            name: "app_home"
        )
    ]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[
        Route(
            path: '/a-propos',
            name: "app_about"
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

    #[
        Route(
            path: '/contact',
            name: "app_contact"
        )

    ]
    public function contact()
    {
        return $this->render('home/contact.html.twig');
    }
}

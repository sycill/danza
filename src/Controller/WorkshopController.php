<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorkshopController extends AbstractController
{
    #[Route(
        '/workshop',
        name: 'app_workshop'
    )]
    public function index(): Response
    {
        return $this->render('workshop/index.html.twig', [
            'controller_name' => 'WorkshopController',
        ]);
    }
}

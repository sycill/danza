<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Lesson;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LessonController extends AbstractController
{
    #[Route('/cours', name: 'app_cours')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // $repository = $doctrine->getRepository(Lesson::class);
        // $lessons = $repository->findBy([], ['title' => 'ASC']);
        return $this->render('lesson/index.html.twig');
    }

    #[Route('/cours/{id}', name: 'details')]

    public function show($id, ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Lesson::class);
        $lesson = $repository->find($id);
        return $this->render('lesson/lesson_details.html.twig', ['lesson' => $lesson]);
    }
}

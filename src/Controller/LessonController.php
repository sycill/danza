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

#[Route('/lessons', name: 'lessons_')]

class LessonController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Lesson::class);
        $lessons = $repository->findBy([], ['title' => 'ASC']);
        return $this->render('lesson/index.html.twig', ['lessons' => $lessons]);
    }

    #[Route('/lesson/{id}', name: 'details')]

    public function show($id, ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Lesson::class);
        $lesson = $repository->find($id);
        return $this->render('lesson/lesson_details.html.twig', ['lesson' => $lesson]);
    }
}

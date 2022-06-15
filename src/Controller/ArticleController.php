<?php

namespace App\Controller;

// use DateTime;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{

    #[
        Route(
            path: '/articles',
            name: "app_article"
        )
    ]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Article::class);
        $articles = $repository->findBy([], ['title' => 'DESC']);
        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    #[
        Route(
            path: "/articles/{id}",
            name: "show_articles",
            methods: ["GET"]
        )
    ]

    public function showArticle($id, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Article::class);
        $articles = $repository->find($id);
        return $this->render('article/show.html.twig', ['articles' => $articles]);
    }


    #[Route('/articles/categories/{id}', name: 'article_categories')]
    public function showArticlesByCategory($id, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Category::class);
        $categories = $repository->find($id);
        return $this->render('article/categorie.html.twig', ['categories' => $categories]);
    }
}

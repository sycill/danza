<?php

namespace App\Controller;

// use DateTime;
use App\Entity\Lesson;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
use App\Form\CommentType;
use Gedmo\Mapping\Annotation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{

    #[
        Route(
            path: "/article/{id}",
            name: "show_articles",
            methods: ["GET", "POST"]
        )
    ]

    public function showArticle($id, ManagerRegistry $doctrine, EntityManagerInterface $em, Request $request): Response
    {
        $comment = new Comment();
        $user = $this->getUser();
        $artRep = $doctrine->getRepository(Article::class);
        $article = $artRep->find($id);
        $cmForm = $this->createFormBuilder()
            ->getForm();
        $cmForm = $this->createForm(CommentType::class, $comment);
        $cmForm->handleRequest($request);
        if ($cmForm->isSubmitted() && $cmForm->isValid()) {
            $comment->setCreatedAt(new \Datetimeimmutable());
            $comment->setUser($user);
            $comment->setArticle($article);
            // Attribuer le commentaire à l'article
            $em->persist($comment);
            $em->flush();
        }

        // $comment = $cmRep->findAll();
        // $this->generateUrl('/article', array('slug' => $article->getSlug()), UrlGeneratorInterface::ABSOLUTE_URL);
        return $this->render('article/show.html.twig', ['article' => $article, 'cmForm' => $cmForm->createView()]);
    }


    #[
        Route(
            path: '/articles/category/{id}',
            name: 'article_categories'
        )
    ]
    public function showArticlesByCategory($id, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Category::class);
        $category = $repository->find($id);

        return $this->render('article/categorie.html.twig', ['category' => $category]);
    }


    #[
        Route(
            path: '/articles/{page?1}/{nbr?6}',
            name: "app_article"
        )
    ]
    public function showArticles($nbr, $page, ManagerRegistry $doctrine): Response
    {
        $repo1 = $doctrine->getRepository(Article::class);
        $repo2 = $doctrine->getRepository(Category::class);
        $repo3 = $doctrine->getRepository(Lesson::class);
        $articles = $repo1->findBy([], ['date' => 'DESC'], $nbr, ($page - 1) * $nbr);
        $nbArticle = $repo1->count([]);
        $nbPage = ceil($nbArticle / $nbr);
        $categories = $repo2->findAll();
        $lessons = $repo3->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
            'lessons' => $lessons,
            'isPaginated' => true,
            'nbr' => $nbr,
            'nbPage' => $nbPage,
            'page' => $page
        ]);
    }
}

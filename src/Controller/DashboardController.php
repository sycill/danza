<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Article;
use App\Entity\Category;
use App\Form\ArticleType;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;


class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'admin')]

    public function index(ManagerRegistry $doctrine): Response
    {
        /** @var UserRepository */
        $repository = $doctrine->getRepository(Article::class);
        $user = $this->getUser();
        $articles = $repository->findArticleByAuthor($user);
        return $this->render('dashboard/dashboard.html.twig', ['articles' => $articles]);
    }

    #[Route('/admin/article{id}', name: 'admin_article')]

    public function showArticle($id, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Article::class);
        $article =  $repository->find($id);
        return $this->render('dashboard/article/show_article.html.twig', ['article' => $article]);
    }

    #[Route('/super_admin', name: 'super')]
    #[Security("is_granted('ROLE_SUPER_ADMIN')")]

    public function superAdmin(Request $request, EntityManagerInterface $em,  UserPasswordHasherInterface $passwordHasher): Response
    {
        $teacher = new User();
        $teacher->setRoles(['ROLE_ADMIN']);
        $teacherForm = $this->createFormBuilder()->getForm();
        $teacherForm = $this->createform(UserType::class, $teacher);
        $teacherForm->handleRequest($request);
        if ($teacherForm->isSubmitted() && $teacherForm->isValid()) {
            $hash = $passwordHasher->hashPassword($teacher, $teacher->getPassword());
            $teacher->setPassword($hash);
            $em->persist($teacher);
            $em->flush();
            return $this->redirectToRoute('super');
        }
        return $this->render('super_admin/super_admin.html.twig', ['teacherForm' => $teacherForm->createView()]);
    }

    #[Route('/admin/add_article', name: 'create_article')]

    public function addArticle(Request $request, EntityManagerInterface $em)
    {
        $article = new Article();
        // On crée un nouvel article qu'on récupère depuis use App\Entity\Article;
        $articleForm = $this->createFormBuilder()
            ->getForm();
        $articleForm = $this->createForm(ArticleType::class, $article);
        // on va lui spécifier de la data qui est l'objet article qui est vide à ce stade.
        $articleForm->handleRequest($request);
        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
            $article->setDate(new \DateTime());
            $em->persist($article);
            $em->flush();
            // $this->addFlash('success', 'Vous avez bien créé un article');
            return $this->redirectToRoute('admin');
        }

        return $this->render('dashboard/article/add_articles.html.twig', ['articleForm' => $articleForm->createView()]);
    }

    #[Route('/admin/edit_article/{id}', name: 'article_edit')]

    public function editArticle($id, ManagerRegistry $doctrine, Request $request, Article $article)
    {

        $em = $doctrine->getManager();
        $repository = $doctrine->getRepository(Article::class);
        $article = $repository->find($id);
        $articleForm = $this->createForm(ArticleType::class, $article);
        $articleForm->handleRequest($request);
        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
            $em->persist($request);
            $em->flush();
            return $this->redirectToRoute('admin');
        }
        return $this->render('dashboard/article/edit_article.html.twig', ['articleForm' => $articleForm->createView()]);
    }

    #[Route('/admin/delete_article/{id}', name: 'article_delete')]
    public function deleteArticle($id, ManagerRegistry $doctrine,  Article $article)
    {
        $this->denyAccessUnlessGranted('ARTICLE_DELETE', $article);
        $em = $doctrine->getManager();
        $repository = $doctrine->getRepository(Article::class);
        $article = $repository->find($id);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('admin');
    }

    #[Route('/admin/creer/categorie', name: 'add_categories')]

    public function addCategory(Request $request, EntityManagerInterface $em)
    {
        $category = new Category();
        $categoryForm = $this->createFormBuilder()->getForm();
        $categoryForm = $this->createForm(CategoryType::class, $category);
        $categoryForm->handleRequest($request);
        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('admin');
        }
        return $this->render('dashboard/categories/add_categories.html.twig', ['categoryForm' => $categoryForm->createView()]);
    }
}

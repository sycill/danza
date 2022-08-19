<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Article;
use App\Entity\Category;
use App\Form\ArticleType;
use App\Service\Uploader;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

    public function superAdmin(Request $request, ManagerRegistry $doctrine, EntityManagerInterface $em,  UserPasswordHasherInterface $passwordHasher): Response
    {
        $teacher = new User();
        $teacher->setRoles(['ROLE_ADMIN']);
        $teacherForm = $this->createFormBuilder()->getForm();
        $teacherForm = $this->createform(UserType::class, $teacher);
        /** @var UserRepository */
        $repository = $doctrine->getRepository(User::class);
        $users = $repository->findByRoleAdmin($repository);
        $teacherForm->handleRequest($request);
        if ($teacherForm->isSubmitted() && $teacherForm->isValid()) {
            $hash = $passwordHasher->hashPassword($teacher, $teacher->getPassword());
            $teacher->setPassword($hash);
            $em->persist($teacher);
            $em->flush();
            return $this->redirectToRoute('super');
        }
        return $this->render('super_admin/super_admin.html.twig', ['teacherForm' => $teacherForm->createView(), 'users' => $users]);
    }

    #[Route(
        path: '/super_admin/user/{id}',
        name: 'edit_user'
    )]
    #[Security("is_granted('ROLE_SUPER_ADMIN')")]

    public function editUser($id, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $repository = $doctrine->getRepository(User::class);
        $user = $repository->find($id);
        $userForm = $this->createFormBuilder()
            ->getForm();
        $userForm = $this->createForm(UserType::class, $user);
        $em->flush();
        return $this->render('super_admin/edit_user.html.twig', ['userForm' => $userForm->createView()]);
    }

    public function deleteUser()
    {
    }

    #[Route('/admin/create_article', name: 'create_article')]

    public function createArticle(Request $request, EntityManagerInterface $em, Uploader $uploader)
    {
        $article = new Article();
        $user = $this->getUser();
        // On crée un nouvel article qu'on récupère depuis use App\Entity\Article;
        $articleForm = $this->createFormBuilder()
            ->getForm();
        $articleForm = $this->createForm(ArticleType::class, $article);
        // on va lui spécifier de la data qui est l'objet article qui est vide à ce stade.
        $articleForm->handleRequest($request);
        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
            /** @var UploadedFile */
            $image = $articleForm->get('imageFile')->getData();
            $folder = $this->getParameter('image.folder');
            $extension = $image->guessExtension() ?? 'bin';
            $filename = bin2hex(random_bytes(10)) . '.' . $extension;
            $image->move($folder, $filename);
            $article->setImageName($this->getParameter('image.folder.public_path') . '/' . $filename);
            // On stocke l'URL de l'image dans la bdd
            $article->setDate(new \DateTime());
            $article->setUser($user);
            $em->persist($article);
            $em->flush();
            // $this->addFlash('success', 'Vous avez bien créé un article');
            return $this->redirectToRoute('admin');
        }

        return $this->render('dashboard/article/add_articles.html.twig', ['articleForm' => $articleForm->createView()]);
    }

    #[Route('/admin/edit_article/{id}', name: 'article_edit')]

    public function editArticle($id, ManagerRegistry $doctrine, Request $request, Article $article, Uploader $uploader, $oldImage = null)
    {

        $em = $doctrine->getManager();
        $repository = $doctrine->getRepository(Article::class);
        $article = $repository->find($id);
        $articleForm = $this->createForm(ArticleType::class, $article);
        $articleForm->handleRequest($request);
        if ($articleForm->isSubmitted() && $articleForm->isValid()) {
            $image = $articleForm->get('imageFile')->getData();
            $folder = $this->getParameter('image.folder');
            // // On vérifie si le champ imageFile est vide ou non
            if ($oldImage) {
                $this->fs->remove($folder . '/' . pathinfo($oldImage, PATHINFO_BASENAME));
            }
            if ($image) {
                $extension = $image->guessExtension() ?? 'bin';
                $filename = bin2hex(random_bytes(10)) . '.' . $extension;
                $image->move($folder, $filename);
                $article->setImageName($this->getParameter('image.folder.public_path') . '/' . $filename);
            }
            $em->flush();
            $this->addFlash('success', 'Modifications sauvegardées !');
            return $this->redirectToRoute('admin');
        }
        return $this->render('dashboard/article/edit_article.html.twig', ['articleForm' => $articleForm->createView()]);
    }

    #[Route('/admin/delete_article/{id}', name: 'article_delete')]
    #[Security("is_granted('ADMIN')")]

    public function deleteArticle($id, ManagerRegistry $doctrine,  Article $article)
    {
        $em = $doctrine->getManager();
        $repository = $doctrine->getRepository(Article::class);
        $article = $repository->find($id);
        $image = $article->getImageName();
        if ($image) {
            $imageFile = ($this->getParameter('image.folder') . '/' . $image);
            if (file_exists($imageFile)) {
                unlink($imageFile);
            }
            // On vérifie si l'image existe dans le dossier en question
        }
        // dd($image);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('admin');
    }

    #[Route('/admin/create_category', name: 'add_categories')]

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

<?php

namespace App\Controller;

use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EmailController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer,): Response
    {
        $contactForm = $this->createFormBuilder()
            ->add('nom', TextType::class, ['label' => 'Nom :'])
            ->add('prenom', TextType::class, ['label' => 'Prenom :'])
            ->add('email', TextType::class, ['label' => 'Email :'])
            ->add('message', TextareaType::class, ['label' => 'Message :'])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer'])
            ->getForm();
        $email = new TemplatedEmail();
        // to, from, text, attachment, bcc, cc, subject
        $email
            ->to(new Address('jean@gmail.com', 'Jean'))
            ->subject('Bienvenue chez Danza !')
            ->cc('toto@gmail.com')
            // bcc : La liste des contacts n'est pas visibles des cibles (blind carbon copies)
            ->htmlTemplate('email/contact.html.twig')
            ->context(['username' => 'Jean'])
            ->text('Bienvenue chez Danza, nous sommes très content de votre arrivée');
        $mailer->send($email);

        return $this->render('email/form.html.twig', [
            'email' => $email, 'contactForm' => $contactForm->createView()
        ]);
    }
}

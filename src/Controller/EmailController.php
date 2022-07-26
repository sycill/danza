<?php

namespace App\Controller;

use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmailController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MailerInterface $mailer): Response
    {
        $email = new TemplatedEmail();
        // to, from, text, attachment, bcc, cc, subject
        $email
            ->to(new Address('jean@gmail.com', 'Jean'))
            ->subject('Bienvenue chez Danza !')
            ->cc('toto@gmail.com')
            // La liste des contacts n'est pas visibles des cibles (blind carbon copies)
            // ->html('<h1> Bonjour Toto! </h1> <p>Bienvenue sur Danza !</p>')
            ->htmlTemplate('email/contact.html.twig')
            ->context(['username' => 'Jean'])
            ->text('Bienvenue chez Danza, nous sommes très content de votre arrivée');
        $mailer->send($email);

        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
        ]);
    }
}

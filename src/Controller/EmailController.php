<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmailController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(MailerInterface $mailer, Request $request): Response
    {
        $contactForm = $this->createFormBuilder()
            ->add('nom', TextType::class, ['label' => 'Nom :'])
            ->add('prenom', TextType::class, ['label' => 'Prenom :'])
            ->add('email', TextType::class, ['label' => 'Email :'])
            ->add('message', TextareaType::class, ['label' => 'Message :'])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer'])
            ->getForm();
        $contactForm->handleRequest($request);
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contactFormData = $contactForm->getData();
            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('mancini.danza@gmail.com')
                ->subject('Vous avez reçu un nouveau message')
                ->text(
                    'Destinateur : ' . $contactFormData['email'] . \PHP_EOL .
                        $contactFormData['message'],
                    'text/plain'
                );
            $mailer->send($message);
            $this->addFlash('success', 'Votre message a été envoyé');
            return $this->redirectToRoute('app_home');
        }
        // $email = new TemplatedEmail();
        // to, from, text, attachment, bcc, cc, subject
        return $this->render('email/contact.html.twig', [
            'contactForm' => $contactForm->createView()
        ]);
    }
}

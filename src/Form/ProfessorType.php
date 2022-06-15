<?php

namespace App\Form;

use App\Entity\Professor;
use Doctrine\DBAL\Types\JsonType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfessorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['label' => 'Prénom :'])
            ->add('lastname', TextType::class, ['label' => 'Nom :'])
            ->add('username', TextType::class, ['label' => 'Pseudo :'])
            ->add('email', EmailType::class, ['label' => 'Email :'])
            ->add('dance_taught', TextType::class, ['label' => 'Discipline :'])
            ->add('password', PasswordType::class, ['label' => 'Mot de passe :'])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professor::class,
        ]);
    }
}

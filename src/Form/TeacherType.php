<?php

namespace App\Form;

use App\Entity\Teacher;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, ['label' => 'Nom :'])
            ->add('firstname', TextType::class, ['label' => 'Prénom :'])
            ->add('username', TextType::class, ['label' => 'Pseudo :'])
            ->add('email', EmailType::class, ['label' => 'Email :'])
            ->add('password', PasswordType::class, ['label' => 'Mot de passe :'])
            // ->add('lesson', EntityType::class, ['class' => Teacher::class, 'label' => 'Cours :', 'query_builder' => function (EntityRepository $er) {
            //     return $er->createQueryBuilder('l')->orderBy('l.username', 'ASC');
            // },]);
            ->add('dance_taught', TextType::class, ['label' => 'Discipline :'])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}

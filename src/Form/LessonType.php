<?php

namespace App\Form;

use App\Entity\Lesson;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre :'])
            ->add('description', CKEditorType::class, ['label' => 'Description :'], array('config' => array('toobar' => 'full')))
            ->add('price', NumberType::class, ['label' => 'Prix :'])
            ->add('date', DateTimeType::class, ['widget' => 'single_text'])
            // ->add('page')
            ->add('displine', TextType::class, ['label' => 'Discipline'])
            // ->add('user', EntityType::class, ['class' => User::class, 'label' => 'Utilisateur'])
            // ->add('reservations', EntityType::class, ['class' => Reservation::class])
            // ->add('teacher', EntityType::class, ['class' => Teacher::class, 'label' => 'Professeurs', 'multiple' => true, 'expanded' => true])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lesson::class,
        ]);
    }
}

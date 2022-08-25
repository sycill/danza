<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, ['label' => 'Prénom'])
            ->add('last_name', TextType::class, ['label' => 'Nom de famille'])
            ->add('username', TextType::class, ['label' => 'Pseudo'])
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class, ['label' => 'Mot de passe'])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],

            ])
            ->add(
                'imageFile',
                FileType::class,
                // array('data_class' => null),
                [
                    'label' => 'Image : ',
                    'mapped' => false,
                    // Si il y a une image dans l'article = false, si il n'y a pas d'image = true
                    'constraints' => [
                        new Image(
                            [
                                'mimeTypesMessage' => 'Veuillez soumettre une image',
                                'maxSize' => '1M',
                                'maxSizeMessage' => 'Votre image fait {{ size }} {{ suffix }}. La limite est de {{ limit }} {{ suffix }}'
                            ]
                        )
                    ]
                ]
            )

            ->add('submit', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'submitBtn']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

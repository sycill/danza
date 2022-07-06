<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',  TextType::class, ['label' => 'Titre :'])
            ->add('description', CKEditorType::class, ['label' => 'Description :'])
            ->add('content', CKEditorType::class, ['label' => 'Contenu :'])
            ->add('categories', EntityType::class, [
                'class' => Category::class, 'label' => 'Catégorie(s) :',
                'multiple' => true,
                'expanded' => false,
                'by_reference' => false,
                'choice_label' => 'title'
            ])
            // ->add('image', VichFileType::class)
            // ->add('updated_at', DateTimeType::class)
            ->add('user', EntityType::class, [
                'class' => User::class, 'label' => 'Professeur :', 'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')->orderBy('t.username', 'ASC');
                },
                'choice_label' => 'username'
            ])
            ->add(
                'imageName',
                FileType::class,
                [
                    'label' => 'Image',
                    'constraints' => [
                        new Image(
                            [
                                'mimeTypesMessage' => 'Veuillez soumettre une image',
                                'maxSize' => '400000',
                                'maxSizeMessage' => 'Votre image fait {{ size }} {{ suffix }}. Ma limite est de {{ limit }} {{ suffix }}'
                            ]
                        )
                    ]

                ]
            )
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

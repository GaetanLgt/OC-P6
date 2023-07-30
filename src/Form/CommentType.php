<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => 'Votre commentaire',
                'attr' => [
                    'placeholder' => 'Votre commentaire'
                ],
                'required' => true
            ])
            ->add('authorPicture', TextType::class, [
                'label' => 'Votre photo',
                'attr' => [
                    'placeholder' => 'Votre photo'
                ],
                'required' => true
            ])
            ->add('createdAt', DateType::class, [
                'label' => 'Date de création du commentaire',
                'attr' => [
                    'placeholder' => 'Date de création du commentaire'
                ],
                'required' => true
            ])
            ->add('author', TextType::class, [
                'label' => 'Votre pseudo',
                'attr' => [
                    'placeholder' => 'Votre pseudo'
                ],
                'required' => true
            ])
            ->add('figure', TextType::class, [
                'label' => 'Figure',
                'attr' => [
                    'placeholder' => 'Figure'
                ],
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}

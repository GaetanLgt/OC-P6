<?php

namespace App\Form;

use App\Entity\Figure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name' , TextType::class, [
                'label' => 'Nom de la figure',
                'attr' => [
                    'placeholder' => 'Nom de la figure'
                ],
                'contraints' => [
                    'min' => 3,
                    'max' => 50
                ],
                'require' => true
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de la figure',
                'attr' => [
                    'placeholder' => 'Description de la figure'
                ],
                'contraints' => [
                    'min' => 3,
                    'max' => 500
                ],
                'require' => true
            ])
            ->add('groupe' , ChoiceType::class, [
                'label' => 'Groupe de la figure',
                'choices' => [
                    'Grab' => 'grab',
                    'Rotation' => 'rotation',
                    'Flip' => 'flip',
                    'Slide' => 'slide'
                ],
                'require' => true
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug de la figure',
                'attr' => [
                    'placeholder' => 'Slug de la figure'
                ],
                'contraints' => [
                    'min' => 3,
                    'max' => 50
                ],
                'require' => true
            ])
            ->add('updatedAt', DateType::class, [
                'label' => 'Date de mise à jour de la figure',
                'attr' => [
                    'placeholder' => 'Date de mise à jour de la figure'
                ],
                'contraints' => [
                    'min' => 3,
                    'max' => 50
                ],
                'require' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Figure::class,
        ]);
    }
}

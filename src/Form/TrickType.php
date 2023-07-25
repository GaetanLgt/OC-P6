<?php

namespace App\Form;

use App\Entity\Figure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
                'required' => true
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de la figure',
                'attr' => [
                    'placeholder' => 'Description de la figure'
                ],
                'required' => true
            ])
            ->add('category' , CollectionType::class, [
                'label' => 'Groupe de la figure',
                'attr' => [
                    'placeholder' => 'Groupe de la figure'
                ],
                'required' => true
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug de la figure',
                'attr' => [
                    'placeholder' => 'Slug de la figure'
                ],
                'required' => true
            ])
            ->add('updatedAt', DateType::class, [
                'label' => 'Date de mise à jour de la figure',
                'attr' => [
                    'placeholder' => 'Date de mise à jour de la figure'
                ],
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Figure::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'trick_item',
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Recettes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddRecettesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('temps_de_preparation')
            ->add('temps_de_repos')
            ->add('temps_de_cuisson')
            ->add('ingredients')
            ->add('etapes_de_preparation')
            ->add('allergene')
            ->add('type')
            // ->add('allergene_recette')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recettes::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\DemandeSang;
use App\Entity\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class DemandeSangType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('date_utilisation', DateTimeType::class )
        ->add('type',ChoiceType::class, ['choices' => 
            [   'CG' => 'CG', 
                'Plasma' => 'CG',
                'ST' => 'ST',
            ],
        ])
        ->add('nombre_poche', NumberType::class)
        ->add('G_S', TextType::class)
        ->add('serum',NumberType::class)
        ->add('cin_malade',NumberType::class, ['attr' => ['maxlength' => 8,'minlength' =>7]])
        ->add('nom_malade', TextType::class)
        

        ->add('prenom_malade', TextType::class)
        ->add('service', EntityType::class , [
            'class' => Service::class,
            'choice_label' => 'NomService',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DemandeSang::class,
        ]);
    }
}
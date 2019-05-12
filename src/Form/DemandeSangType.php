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
                'Plasma' => 'Plasma',
                'ST' => 'ST',
            ],
        ])
        ->add('nombre_poche')
        ->add('G_S', TextType::class)
        ->add('serum')
        ->add('type_demande')
        ->add('service', EntityType::class , [
            'class' => Service::class,
            'choice_label' => function ($service) {
                return $service->getNomService();
            },
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
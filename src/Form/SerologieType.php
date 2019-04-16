<?php

namespace App\Form;
use App\Entity\Serologie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SerologieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('A_utiliser_avant', DateType::class, array(
                'required' => false,
                'empty_data' => null,
                'attr' => array(
                    'placeholder' => 'mm/dd/yyyy'
                )))
            ->add('groupe_sanguin',TextType::class)
            ->add('AGHBR',ChoiceType::class, [
                'choices' =>[   ' ' => ' ',
                                'positive' => 'positive', 
                                'négative' => 'négative',
                            ],
            ])
           
            ->add('ACHCV',ChoiceType::class, [
                'choices' =>[   ' ' => ' ', 
                                'positive' => 'positive',
                                'négative' => 'négative',
                            ],
            ])
          
            ->add('TPHA',ChoiceType::class, [
                'choices' =>[   ' ' => ' ',  
                                'positive' => 'positive',
                                'négative' => 'négative',
                            ],
            ])
          
            ->add('HIV',ChoiceType::class, [
                'choices' =>[   ' ' => ' ',
                                'positive' => 'positive',
                                'positive' => 'positive', 
                                'négative' => 'négative',
                            ],
            ])
           
            ->add('Resultat_Serologie',ChoiceType::class, [
                'choices' =>[   ' ' => ' ',
                                'Donneur valide' => 'Donneur valide', 
                                'Donneur invalide' => 'Donneur invalide',
                            ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serologie::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Donneur;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class DonneurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class )
        ->add('prenom', TextType::class)
        ->add('sexe',ChoiceType::class, [
            'choices' => [ 'Femme' => 'femme', 
            'Homme' => 'homme',],
        ])
        ->add('prenom_pere', TextType::class)
        ->add('prenom_mere', TextType::class)
        ->add('date_de_naissance',BirthdayType::class)
        ->add('NUM_CIN')
        ->add('origine', TextType::class)
        ->add('etat_civil',ChoiceType::class, [
            'choices' =>[   'Marié' => 'Marié', 
                            'Célibataire' => 'Célibataire',
                        ],
        ])

        ->add('Adresse_complete')
        ->add('numero_telephone')
        ->add('profession')
        ->add('Dons_anterieurs',ChoiceType::class, [
            'choices' =>[   'Oui' => 'Oui', 
                            'Non' => 'Non',
                        ],
            ])
        ->add('Dons_anterieurs_volontaires')
        ->add('Dons_anterieurs_familiaux')
        ->add('donneur_convocable',ChoiceType::class, [
            'choices' =>[   'Oui' => 'Oui', 
                            'Non' => 'Non',
                        ],
        ])
        ->add('DateDuDernierDon', DateTimeType::class, array(
            'required' => false,
                'empty_data' => null,
                'attr' => array(
                    'placeholder' => 'mm/dd/yyyy'
                )))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Donneur::class,
        ]);
    }
}
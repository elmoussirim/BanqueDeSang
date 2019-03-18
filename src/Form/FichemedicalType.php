<?php

namespace App\Form;

use App\Entity\FicheDeDonneurDeSang;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class FichemedicalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class )
        ->add('prenom', TextType::class)
        ->add('NUMERO_CIN',NumberType::class, ['label' => 'Num CIN'])
        ->add('date_de_naissance',BirthdayType::class)
        ->add('taille',NumberType::class)
        ->add('poids',NumberType::class)
        ->add('groupe',TextType::class, ['label' => 'Groupe sanguin'])
        ->add('RAA',CheckboxType::class, [
            'label'    => 'RAA ',
            'required' => false,
        ])
        ->add('Paludisme',CheckboxType::class, [
            'label'    => 'Paludisme',
            'required' => false,
        ])
        ->add('Maladie_pulmonaire',CheckboxType::class, [
            'label'    => 'Maladie pulmonaire',
            'required' => false,
        ])
        ->add('Ictere', CheckboxType::class, [
            'label'    => 'Ictere',
            'required' => false,
        ])
        ->add('Diabete',CheckboxType::class, [
            'label'    => 'Diabete',
            'required' => false,
        ])
        ->add('Autre',CheckboxType::class, [
            'label'    => 'Autre',
            'required' => false,
        ])
        ->add('T_A',TextType::class)
        ->add('Coeur',TextType::class)
        ->add('Appariel_Respiratoire',TextType::class)
        ->add('Foie',TextType::class)
        ->add('Rate',TextType::class)
        ->add('Systeme_nerveux',TextType::class)
        ->add('ApteInapte', ChoiceType::class, [
            'choices' => [ 'Apte' => 'Apte',
                            'Inpte' => 'Inpte',],
        ])
        ->add('Observations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheDeDonneurDeSang::class,
        ]);
    }
}
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

class FicheMedicaleEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('num_donneur', TextType::class , ['disabled' => true,])
        ->add('taille',NumberType::class, ['disabled' => true,])
        ->add('poids',NumberType::class, ['disabled' => true,])
        ->add('groupe',TextType::class, ['label' => 'Groupe sanguin', 'disabled' => true,])
        ->add('RAA',TextType::class, ['disabled' => true,])
        ->add('Paludisme',TextType::class, [
            'label'    => 'Paludisme',
            'disabled' => true,])
        ->add('Maladie_pulmonaire',TextType::class, [
            'label'    => 'Maladie pulmonaire',
            'disabled' => true,])
        ->add('Ictere', TextType::class, ['disabled' => true,])
        ->add('Diabete',TextType::class, ['disabled' => true,])
        ->add('Autre',TextType::class, ['disabled' => true,])
        ->add('T_A',TextType::class, ['disabled' => true,])
        ->add('Coeur',TextType::class, ['disabled' => true,])
        ->add('Appariel_Respiratoire',TextType::class, ['disabled' => true,])
        ->add('Foie',TextType::class, ['disabled' => true,])
        ->add('Rate',TextType::class, ['disabled' => true,])
        ->add('Systeme_nerveux',TextType::class, ['disabled' => true,])
        ->add('ApteInapte', TextType::class, ['disabled' => true,])
        
        ->add('Observations', TextType::class, ['disabled' => true,])
        ->add('N_ordre',NumberType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheDeDonneurDeSang::class,
        ]);
    }
}
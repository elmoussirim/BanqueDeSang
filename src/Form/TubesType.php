<?php

namespace App\Form;

use App\Entity\Tubes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class TubesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('N_ordre', NumberType::class )
        ->add('NomDonneur',TextType::class, ['label' => 'Nom du donneur'])
        ->add('PrenomDonneur',TextType::class, ['label' => 'Prenom du donneur'])
        ->add('CinDonneur',NumberType::class, ['label' => 'N°cin du donneur'], ['attr' => ['maxlength' => 8]])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tubes::class,
        ]);
    }
}
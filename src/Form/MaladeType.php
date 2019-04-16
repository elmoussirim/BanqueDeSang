<?php

namespace App\Form;

use App\Entity\Malade;
use App\Entity\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;


class MaladeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('malade')
            ->add('date_de_naissance',BirthdayType::class)
            ->add('sexe')
            ->add('age')
            ->add('adresse')
            ->add('profession')
            ->add('telephone')
            ->add('numero_cin')
            ->add('groupe_sanguin')
            ->add('service', EntityType::class , [
                'class' => Service::class,
                'choice_label' => function ($service) {
                    if ($service->getExiste() == "oui")
                    return $service->getNomService();
                },
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Malade::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\User;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NUM_CIN',NumberType::class,['attr' => ['maxlength' => 8]])

            ->add('username')
            ->add('email')
            ->add('poste', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => 'Administrateur',
                    'Technicien de laboratoire' => 'Technicien de laboratoire',
                    'Agent d\'accueil' => 'Agent d\'accueil',
                    'Infirmière de prélèvement' => 'Infirmière de prélèvement',
                    'Médecin de prélèvement' => 'Médecin de prélèvement',
                    'Médecin de service' => 'Médecin de service',
                    'Infirmière de service' => 'Infirmière de service',
                ],
            ])
            ->add('password',PasswordType::class)
            ->add('confirm_password',PasswordType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

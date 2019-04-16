<?php

namespace App\Form;

use App\Entity\Poche;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PocheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        if(statut == "Poche en attente"){

            $builder
                ->add('Type',ChoiceType::class, [
                    'choices' =>[   'CG' => 'CG',
                                    'ST' => 'ST', 
                                    'Plasma' => 'Plasma'
                                ],
                ])
                ->add('congelateur', EntityType::class , [
                    'class' => Congelateur::class,
                    'choice_label' => function ($congelateur) {
                        if ($congelateur->getExiste() == "oui")
                        return $congelateur->getType().' '.$congelateur->getNumCong();
                    }
                ])
            ;
        }

        elseif(statut == "Poche en attente ---> Poche en stock"){
            $builder
            ->add('a_utiliser_avant',DateType::class)
            ->add('groupe_sanguins',TextType::class)
            ->add('congelateur', EntityType::class , [
                'class' => Congelateur::class,
                'choice_label' => function ($congelateur) {
                    return $congelateur->getType().' '.$congelateur->getNumCong();
                    }
                ])
            ;
        }
        elseif(statut == "Poche en attente ---> Poche périmée" || statut == "Poche en stock ---> Poche périmée")    
        {
            $builder
            ->add('session',TextType::class)
            ->add('raison',TextType::class)
    
            ->add('congelateur', EntityType::class , [
                'class' => Congelateur::class,
                'choice_label' => function ($congelateur) {
                    return $congelateur->getType().' '.$congelateur->getNumCong();
                    }
                ])
            ;
        }
        elseif(statut == "Poche en stock ---> Poche sortie" || statut == "Poche reservée ---> Poche sortie")    
        {
            $builder
            ->add('session',TextType::class)
            ->add('raison',TextType::class)
            ;
        }
        elseif(statut == "Poche en stock --- >Poche reservée")
        {
            $builder
            ->add('demande', NumberType::class)
            ->add('test_de_compatibilite', NumberType::class)
            ->add('congelateur', EntityType::class , [
                'class' => Congelateur::class,
                'choice_label' => function ($congelateur) {
                    return $congelateur->getType().' '.$congelateur->getNumCong();
                }
            ])
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Poche::class,
        ]);
    }
}

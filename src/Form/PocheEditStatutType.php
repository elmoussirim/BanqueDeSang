<?php

namespace App\Form;

use App\Entity\Poche;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class PocheEditStatutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   

            $builder
                ->add('statut',ChoiceType::class, [
                    'choices' =>[   'Poche en attente' => 'Poche en attente',
                                    'Poche en attente ---> Poche en stock' => 'Poche en attente ---> Poche en stock',
                                    'Poche en attente ---> Poche perimée' => 'Poche en attente ---> Poche perimée',
                                    'Poche en stock ---> Poche reservée' => 'Poche en stock ---> Poche reservée',
                                    'Poche en stock ---> Poche sortie' => 'Poche en stock ---> Poche sortie',
                                    'Poche en stock ---> Poche perimée' => 'Poche en stock ---> Poche perimée',
                                    'Poche reservée ---> Poche sortie' => 'Poche reservée ---> Poche sortie',
                                    'Poche reservée ---> Poche en stock' => 'Poche reservée ---> Poche en stock',
                                    'Poche sortie ---> Poche en stock' => 'Poche sortie ---> Poche en stock',
                                    'Poche sortie ---> Poche perimée' => 'Poche sortie ---> Poche perimée',

                                ],
                ])
            ;
                        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Poche::class,
        ]);
    }
}

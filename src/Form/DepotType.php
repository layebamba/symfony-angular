<?php

namespace App\Form;

use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montants')
            
           // ->add('date')
         ->add('compte',EntityType::class,['class'=>Compte::class,'choice_label'=>'compte_id'])
         ->add('user',EntityType::class,['class'=>User::class,'choice_label'=>'user_id'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Depot::class,
        ]);
    }
}

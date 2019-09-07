<?php

namespace App\Form;

use App\Entity\Transaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomexp')
            ->add('prenomexp')
            ->add('telexp')
           ->add('mtntenvoi')
            ->add('nomrecep')
            ->add('prenomrecep')
            ->add('telrecep')
            ->add('cni')
            ->add('dateretrait')
            ->add('cniretrait')
            ->add('etat')
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=> Transaction::class,
        ]);
    }
}

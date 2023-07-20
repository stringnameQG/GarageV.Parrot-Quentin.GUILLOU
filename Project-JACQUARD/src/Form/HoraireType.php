<?php

namespace App\Form;

use App\Entity\HoraireOuverture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HoraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lundi')
            ->add('mardi')
            ->add('mercredi')
            ->add('jeudi')
            ->add('vendredi')
            ->add('samedi')
            ->add('dimanche')
            //->add('test')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HoraireOuverture::class,
        ]);
    }
}

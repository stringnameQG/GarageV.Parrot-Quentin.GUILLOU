<?php

namespace App\Form;

use App\Entity\FormulaireContacte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class FormulaireContacteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('e_mail')
            ->add('first_name')
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'formulaire-area',
                    'resize' => 'none' 
                ]
            ])
            ->add('name')
            ->add('numero')
            ->add('sujet')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormulaireContacte::class,
        ]);
    }
}

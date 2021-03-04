<?php

namespace App\Form;

use App\Entity\Vertreta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VertretaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nachname')
            ->add('stelle')
            ->add('tel')
            ->add('email')
            ->add('behoerde')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vertreta::class,
        ]);
    }
}

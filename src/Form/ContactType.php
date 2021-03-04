<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                    'disabled' => true,
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ])
            ->add('email', EmailType::class, [
                    'label' => 'your Email',
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ])
            ->add('message', CKEditorType::class, [
                    'label' => 'your message',
                   
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

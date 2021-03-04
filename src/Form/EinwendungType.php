<?php

namespace App\Form;

use App\Entity\Einwendung;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EinwendungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('verfahrennummer', TextType::class, ['label' => 'Verfahren.Nummer'])
            ->add('v_art', TextType::class, ['label' => 'V.Art'])
            ->add('v_name', TextType::class, ['label' => 'V.Name'])
            ->add('verfasser', TextType::class, ['label' => 'Verfasser'])
            ->add('abteilung', TextType::class, ['label' => 'Abteilung'])
            ->add('anhange', TextType::class, ['label' => 'Anhänge'])
            ->add('aktenzeichen', TextType::class, ['label' => 'Aktenzeichen'])
            ->add('brochure', FileType::class, [
                'label' => 'Einwendung (PDF file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                        
                    ])
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Absenden',
                'attr' => ['class' => 'save'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Einwendung::class,
        ]);
    }
}

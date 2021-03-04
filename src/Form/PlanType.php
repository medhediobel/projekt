<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Planes;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label'=>"title"] )
            ->add('inhalt', TextareaType::class, ['label'=>"inhalt"])
            /*->add('plan') */
            /*->add('createdAt') */
            ->add('category', EntityType::class, [ 'class' => Category::class, 'choice_label' => 'title', 'label'=>"Category"] );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Planes::class,
        ]);
    }
}

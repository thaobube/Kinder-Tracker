<?php

namespace App\Form;

use App\Entity\DayRecord;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AtHomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('homeDescription', TextType::class)
            ->add('homeMood', ChoiceType::class,
            array('choices' =>array(
                'Happy' => 'Happy',
                'Unhappy' => 'Unhappy',
                'Tired' => 'Tired',
                'Cry' => 'Cry',
                'Sick' => 'Sick',
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DayRecord::class,
        ]);
    }
}

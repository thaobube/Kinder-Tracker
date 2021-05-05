<?php

namespace App\Form;

use App\Entity\DayRecord;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isAtHome', ChoiceType::class,
            array('choices' =>array(
                'Yes' => 1,
                'No' => 0,
            )))
            ->add('reasonAtHome', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DayRecord::class,
        ]);
    }
}

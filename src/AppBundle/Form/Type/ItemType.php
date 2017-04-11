<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/11/17
 */

namespace AppBundle\Form\Type;


use AppBundle\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('integerNum', IntegerType::class)
                ->add('numberNum', NumberType::class)
                ->add('floatNum', FloatType::class)
                ->add('moneyNum', MoneyType::class, [
                    'currency' => 'usd'
                ])
                ->add('rangeNum', RangeType::class, [
                    'attr' => [
                        'step' => 5,
                        'min'  => 5,
                        'max'  => 50
                    ]
                ])
                ->add('dateField', DateType::class, [
                    'widget' => 'single_text',
                    //                    'html5'  => false,
                    //                    'format' => 'dd/MM yyyy'
                ])
                ->add('dateTimeField', DateTimeType::class, [
                    'view_timezone'  => 'Europe/Berlin',
                    'model_timezone' => 'Etc/UTC',
                    'widget'         => 'single_text'
                ])
                ->add('choice', ChoiceType::class, [
                    'choices' => [
                        'Yes' => true,
                        'No'  => false
                    ],
                    'label'   => 'Choose wisely',
                    'preferred_choices' => [

                    ],
                    //radio
//                    'expanded' => true,
                    //checkbox
//                    'multiple' => true,
                ])
                ->add('submit', SubmitType::class);

        return $builder;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => Item::class,]
        );
    }

}
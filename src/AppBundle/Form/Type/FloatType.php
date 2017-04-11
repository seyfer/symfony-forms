<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/11/17
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FloatType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'scale' => 3,
                                   'attr'  => [
                                       'step' => 0.01,
                                       //                                       'min'  => 0,
                                       //                                       'max'  => 1000
                                   ]
                               ]);
    }

    public function getParent()
    {
        return NumberType::class;
    }

}
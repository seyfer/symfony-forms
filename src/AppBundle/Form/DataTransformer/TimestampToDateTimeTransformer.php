<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/11/17
 */

namespace AppBundle\Form\DataTransformer;


use Symfony\Component\Form\DataTransformerInterface;

class TimestampToDateTimeTransformer implements DataTransformerInterface
{
    /**
     * @param \DateTime $datetime
     * @return int|mixed
     */
    public function transform($datetime)
    {
        dump($datetime);

        if ($datetime === null) {
            return (new \DateTime('now'))->getTimestamp();
        }

        return $datetime->getTimestamp();
    }

    public function reverseTransform($timestamp)
    {
        dump($timestamp);

        return (new \DateTime())->setTimestamp((int)$timestamp);
    }
}
<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/11/17
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="items")
 */
class Item
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     * @ORM\Column(type="integer", name="integer_num")
     */
    protected $integerNum;

    /**
     * @var string
     * @ORM\Column(type="string", name="number_num")
     */
    protected $numberNum;

    /**
     * @var integer
     * @ORM\Column(type="decimal", name="float_num", scale=3)
     */
    protected $floatNum;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIntegerNum()
    {
        return $this->integerNum;
    }

    /**
     * @param mixed $integerNum
     */
    public function setIntegerNum($integerNum)
    {
        $this->integerNum = $integerNum;
    }

    /**
     * @return mixed
     */
    public function getNumberNum()
    {
        return $this->numberNum;
    }

    /**
     * @param mixed $numberNum
     */
    public function setNumberNum($numberNum)
    {
        $this->numberNum = $numberNum;
    }

    /**
     * @return int
     */
    public function getFloatNum()
    {
        return $this->floatNum;
    }

    /**
     * @param int $floatNum
     */
    public function setFloatNum($floatNum)
    {
        $this->floatNum = $floatNum;
    }
}
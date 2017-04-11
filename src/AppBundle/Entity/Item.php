<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/11/17
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var
     * @ORM\Column(type="integer", name="money_num")
     */
    protected $moneyNum;

    /**
     * @var
     * @ORM\Column(type="string", name="range_num")
     */
    protected $rangeNum;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", name="date_field")
     * @Assert\GreaterThan("yesterday")
     */
    protected $dateField;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="date_time_field")
     * @Assert\GreaterThan("yesterday")
     */
    protected $dateTimeField;

    /**
     * @var string
     * @ORM\Column(type="string", name="choice")
     */
    protected $choice;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="accurate_at")
     * @Assert\DateTime()
     * @Assert\LessThanOrEqual("now")
     */
    protected $accurateAt;

    /**
     * Item constructor.
     */
    public function __construct()
    {
//        $this->dateTimeField = $this->dateTimeField ?? new \DateTime('1970-01-01');
//        $this->accurateAt = $this->accurateAt ?? new \DateTime('1970-01-01');
    }

    /**
     * @return \DateTime
     */
    public function getAccurateAt()
    {
        return $this->accurateAt;
    }

    /**
     * @param \DateTime $accurateAt
     */
    public function setAccurateAt($accurateAt)
    {
        $this->accurateAt = $accurateAt;
    }

    /**
     * @return string
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * @param string $choice
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;
    }

    /**
     * @return \DateTime
     */
    public function getDateTimeField()
    {
        return $this->dateTimeField;
    }

    /**
     * @param \DateTime $dateTimeField
     */
    public function setDateTimeField($dateTimeField)
    {
        $this->dateTimeField = $dateTimeField;
    }

    /**
     * @return \DateTime
     */
    public function getDateField()
    {
        return $this->dateField;
    }

    /**
     * @param \DateTime $dateField
     */
    public function setDateField($dateField)
    {
        $this->dateField = $dateField;
    }

    /**
     * @return mixed
     */
    public function getMoneyNum()
    {
        return $this->moneyNum;
    }

    /**
     * @param mixed $moneyNum
     */
    public function setMoneyNum($moneyNum)
    {
        $this->moneyNum = $moneyNum;
    }

    /**
     * @return mixed
     */
    public function getRangeNum()
    {
        return $this->rangeNum;
    }

    /**
     * @param mixed $rangeNum
     */
    public function setRangeNum($rangeNum)
    {
        $this->rangeNum = $rangeNum;
    }

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
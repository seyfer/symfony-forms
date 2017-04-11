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
 * Timetable
 * @ORM\Table(name="timetable")
 * @ORM\Entity()
 */
class Timetable
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $presetChoice;

    /**
     * @ORM\Column(type="integer")
     */
    protected $manualEntry;

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
    public function getPresetChoice()
    {
        return $this->presetChoice;
    }

    /**
     * @param mixed $presetChoice
     */
    public function setPresetChoice($presetChoice)
    {
        $this->presetChoice = $presetChoice;
    }

    /**
     * @return mixed
     */
    public function getManualEntry()
    {
        return $this->manualEntry;
    }

    /**
     * @param mixed $manualEntry
     */
    public function setManualEntry($manualEntry)
    {
        $this->manualEntry = $manualEntry;
    }

}
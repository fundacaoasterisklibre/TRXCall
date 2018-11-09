<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 25/02/2018
 * Time: 06:52
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TimeGroupItems
 *
 * @ORM\Table(name="time_group_items")
 * @ORM\Entity()
 *
 * @package App\Entity
 */
class TimeGroupItems
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="time_group_items_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TimeGroupItemType")
     * @ORM\JoinColumn(referencedColumnName="value")
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $week;
    /**
     * @ORM\Column(type="datetimetz")
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $dateEnd;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TimeGroupItems
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return TimeGroupItems
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return TimeGroupItems
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeek()
    {
        return $this->week;
    }

    /**
     * @param mixed $week
     * @return TimeGroupItems
     */
    public function setWeek($week)
    {
        $this->week = $week;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param mixed $dateStart
     * @return TimeGroupItems
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param mixed $dateEnd
     * @return TimeGroupItems
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }


}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 25/02/2018
 * Time: 06:55
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TimeGroupType
 *
 * @ORM\Table(name="time_group_type")
 * @ORM\Entity()
 *
 * @package App\Entity
 */
class TimeGroupItemType
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $value;

    /**
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return TimeGroupItemType
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return TimeGroupItemType
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }


}
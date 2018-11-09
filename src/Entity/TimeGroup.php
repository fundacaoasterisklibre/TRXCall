<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 25/02/2018
 * Time: 06:47
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TimeGroup
 *
 * @ORM\Table(name="time_group")
 * @ORM\Entity()
 *
 * @package App\Entity
 */
class TimeGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="time_group_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TimeGroup
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
     * @return TimeGroup
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}
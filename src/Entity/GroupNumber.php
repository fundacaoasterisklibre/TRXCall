<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 05/08/17
 * Time: 00:28
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Device
 * @package  App\Entity
 *
 * @ORM\Table("group_number")
 * @ORM\Entity(repositoryClass="App\Repository\DeviceRepository")
 */
class GroupNumber
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $default = false;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GroupNumber
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     * @return GroupNumber
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }


}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:22
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserAccessProfile
 * @package  App\Entity
 *
 * @ORM\Table("user_access_profile")
 * @ORM\Entity
 */
class UserAccessProfile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $value;

    /**
     * @ORM\Column(type="string")
     */
    protected $label;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return UserAccessProfile
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
     * @return UserAccessProfile
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return UserAccessProfile
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


}

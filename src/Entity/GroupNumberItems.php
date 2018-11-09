<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 25/02/2018
 * Time: 06:04
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class GroupNumberItems
 *
 * @ORM\Table("group_number_items")
 * @ORM\Entity
 *
 * @package App\Entity
 */
class GroupNumberItems
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="group_number_items_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $pattern;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $help;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupNumber")
     */
    private $groupNumber;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return GroupNumberItems
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param mixed $pattern
     * @return GroupNumberItems
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * @param mixed $groupNumber
     * @return GroupNumberItems
     */
    public function setGroupNumber($groupNumber)
    {
        $this->groupNumber = $groupNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * @param mixed $help
     * @return GroupNumberItems
     */
    public function setHelp($help)
    {
        $this->help = $help;
        return $this;
    }


}
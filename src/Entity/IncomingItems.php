<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 25/02/2018
 * Time: 06:43
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class IncomingItems
 *
 * @ORM\Table(name="incoming_items")
 * @ORM\Entity()
 *
 * @package App\Entity
 */
class IncomingItems
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="incoming_item_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Incoming")
     */
    private $incoming;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TimeGroup")
     */
    private $timeGroup;

    /**
     *
     * @var Forward
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Forward", cascade={"persist"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="classname", referencedColumnName="classname"),
     *     @ORM\JoinColumn(name="reference", referencedColumnName="reference")
     * )
     */
    private $to;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return IncomingItems
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIncoming()
    {
        return $this->incoming;
    }

    /**
     * @param mixed $incoming
     * @return IncomingItems
     */
    public function setIncoming($incoming)
    {
        $this->incoming = $incoming;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeGroup()
    {
        return $this->timeGroup;
    }

    /**
     * @param mixed $timeGroup
     * @return IncomingItems
     */
    public function setTimeGroup($timeGroup)
    {
        $this->timeGroup = $timeGroup;
        return $this;
    }

    /**
     * @return Forward
     */
    public function getTo(): Forward
    {
        return $this->to;
    }

    /**
     * @param Forward $to
     * @return IncomingItems
     */
    public function setTo(Forward $to): IncomingItems
    {
        $this->to = $to;
        return $this;
    }

}
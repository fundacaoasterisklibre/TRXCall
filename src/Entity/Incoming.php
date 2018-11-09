<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 05/08/17
 * Time: 00:28
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Incoming
 * @package  App\Entity
 *
 * @ORM\Table("incoming")
 * @ORM\Entity(repositoryClass="App\Repository\DeviceRepository")
 * @UniqueEntity("from")
 */
class Incoming
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="incoming_seq", initialValue=1, allocationSize=100)
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="""from""", type="string")
     *
     */
    private $from;

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
     * @return Incoming
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
     * Set from
     *
     * @param string $from
     *
     * @return Incoming
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param \App\Entity\Forward $to
     *
     * @return Incoming
     */
    public function setTo(\App\Entity\Forward $to = null)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return \App\Entity\Forward
     */
    public function getTo()
    {
        return $this->to;
    }
}

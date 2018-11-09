<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 14/01/2018
 * Time: 13:03
 */

namespace App\Entity\Mailing;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Mailing
 * @package  App\Entity\Mailing
 *
 * @ORM\Table("mailing")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */

class Mailing
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="mailing_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     *
     * @var Forward
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Forward", cascade={"persist"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="forwardClassname", referencedColumnName="classname"),
     *     @ORM\JoinColumn(name="forwardReference", referencedColumnName="reference")
     * )
     */
    private $forward;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Mailing
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Mailing
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getForward()
    {
        return $this->forward;
    }

    /**
     * @param mixed $forward
     * @return Mailing
     */
    public function setForward($forward)
    {
        $this->forward = $forward;
        return $this;
    }


}
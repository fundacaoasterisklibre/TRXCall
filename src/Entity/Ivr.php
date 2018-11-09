<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 14/06/17
 * Time: 22:41
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Realtime\Musiconhold;

/**
 * Class User
 *
 * @package  App\Entity
 *
 * @ORM\Table("ivr")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */
class Ivr
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="string", length=40, nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxTry = 3;
    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $timeout = 5;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $audioWelcome;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $audioRead = 'beep';

    /**
     * @var Musiconhold
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Realtime\Musiconhold")
     * @ORM\JoinColumn(name="moh", referencedColumnName="name")
     *
     */
    private $moh;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxDigit = 1;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dialBranchPermit = false;

    /**
     *
     * @ORM\OneToMany(targetEntity="App\Entity\IvrOption", mappedBy="ivr")
     *
     */
    protected $options;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Ivr
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxTry()
    {
        return $this->maxTry;
    }

    /**
     * @param int $maxTry
     * @return Ivr
     */
    public function setMaxTry($maxTry)
    {
        $this->maxTry = $maxTry;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     * @return Ivr
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return string
     */
    public function getAudioWelcome()
    {
        return $this->audioWelcome;
    }

    /**
     * @param string $audioWelcome
     * @return Ivr
     */
    public function setAudioWelcome($audioWelcome)
    {
        $this->audioWelcome = $audioWelcome;
        return $this;
    }

    /**
     * @return string
     */
    public function getAudioRead()
    {
        return $this->audioRead;
    }

    /**
     * @param string $audioRead
     * @return Ivr
     */
    public function setAudioRead($audioRead)
    {
        $this->audioRead = $audioRead;
        return $this;
    }

    /**
     * @return Musiconhold
     */
    public function getMoh()
    {
        return $this->moh;
    }

    /**
     * @param Musiconhold $moh
     * @return Ivr
     */
    public function setMoh($moh)
    {
        $this->moh = $moh;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxDigit()
    {
        return $this->maxDigit;
    }

    /**
     * @param int $maxDigit
     * @return Ivr
     */
    public function setMaxDigit($maxDigit)
    {
        $this->maxDigit = $maxDigit;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Ivr
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     * @return Ivr
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDialBranchPermit()
    {
        return $this->dialBranchPermit;
    }

    /**
     * @param mixed $dialBranchPermit
     * @return Ivr
     */
    public function setDialBranchPermit($dialBranchPermit)
    {
        $this->dialBranchPermit = $dialBranchPermit;
        return $this;
    }

}

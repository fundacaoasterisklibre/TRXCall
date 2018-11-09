<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 02/07/17
 * Time: 16:58
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Realtime\Sippeers;

/**
 * Class DeviceResource
 * @package  App\Entity
 *
 * @ORM\Table("trunk")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */
class Trunk
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=40, nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="trunk_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TrunkRegisterType")
     * @ORM\JoinColumn(name="register_type", referencedColumnName="name")
     */
    protected $registerType;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $dialType;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $ddi = 55;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $ddd = 19;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $operatorCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $dialPrefix;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $dialSufix;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\AbstractProtocol", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="protocol_id", referencedColumnName="id", unique=true)
     *
     */
    private $protocol;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Trunk
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Trunk
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return TrunkRegisterType
     */
    public function getRegisterType()
    {
        return $this->registerType;
    }

    /**
     * @param mixed $registerType
     * @return Trunk
     */
    public function setRegisterType($registerType)
    {
        $this->registerType = $registerType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param mixed $protocol
     * @return Trunk
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDialType()
    {
        return $this->dialType;
    }

    /**
     * @param mixed $dialType
     * @return Trunk
     */
    public function setDialType($dialType)
    {
        $this->dialType = $dialType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * @param mixed $ddi
     * @return Trunk
     */
    public function setDdi($ddi)
    {
        $this->ddi = $ddi;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @param mixed $ddd
     * @return Trunk
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDialPrefix()
    {
        return $this->dialPrefix;
    }

    /**
     * @param mixed $dialPrefix
     * @return Trunk
     */
    public function setDialPrefix($dialPrefix)
    {
        $this->dialPrefix = $dialPrefix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDialSufix()
    {
        return $this->dialSufix;
    }

    /**
     * @param mixed $dialSufix
     * @return Trunk
     */
    public function setDialSufix($dialSufix)
    {
        $this->dialSufix = $dialSufix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperatorCode()
    {
        return $this->operatorCode;
    }

    /**
     * @param mixed $operatorCode
     * @return Trunk
     */
    public function setOperatorCode($operatorCode)
    {
        $this->operatorCode = $operatorCode;
        return $this;
    }



}

<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 02/07/17
 * Time: 16:58
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Branch
 * @package  App\Entity
 *
 * @ORM\Table("branch")
 * @ORM\Entity(repositoryClass="App\Repository\BranchRepository")
 */
class Branch
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
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    protected $user;

    /**
     * @var PlanRoute
     * @ORM\ManyToOne(targetEntity="App\Entity\PlanRoute")
     */
    protected $planRoute;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Realtime\Voicemail")
     * @ORM\JoinColumn(referencedColumnName="uniqueid")
     */
    protected $voicemail;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Realtime\Sippeers", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="sip_peers_id", referencedColumnName="id")
     */
    private $sip;

    /**
     *
     * @var Forward
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Forward", cascade={"persist"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="alwaysInClassname", referencedColumnName="classname"),
     *     @ORM\JoinColumn(name="alwaysInReference", referencedColumnName="reference")
     * )
     */
    private $alwaysIn;

    /**
     *
     * @var Forward
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Forward", cascade={"persist"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="alwaysOutClassname", referencedColumnName="classname"),
     *     @ORM\JoinColumn(name="alwaysOutReference", referencedColumnName="reference")
     * )
     */
    private $alwaysOut;

    /**
     *
     * @var Forward
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Forward", cascade={"persist"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="busyInClassname", referencedColumnName="classname"),
     *     @ORM\JoinColumn(name="busyInCeference", referencedColumnName="reference")
     * )
     */
    private $busyIn;

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
    private $busyOut;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $permitPhone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $permitMobile;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $permitInternational;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BranchPermission", mappedBy="branch")
     */
    private $permissions;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Branch
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
     * @return Branch
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Branch
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanRoute()
    {
        return $this->planRoute;
    }

    /**
     * @param mixed $planRoute
     * @return Branch
     */
    public function setPlanRoute($planRoute)
    {
        $this->planRoute = $planRoute;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVoicemail()
    {
        return $this->voicemail;
    }

    /**
     * @param mixed $voicemail
     * @return Branch
     */
    public function setVoicemail($voicemail)
    {
        $this->voicemail = $voicemail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSip()
    {
        return $this->sip;
    }

    /**
     * @param mixed $sip
     * @return Branch
     */
    public function setSip($sip)
    {
        $this->sip = $sip;
        return $this;
    }

    /**
     * @return Forward
     */
    public function getAlwaysIn()
    {
        return $this->alwaysIn;
    }

    /**
     * @param Forward $alwaysIn
     * @return Branch
     */
    public function setAlwaysIn($alwaysIn)
    {
        $this->alwaysIn = $alwaysIn;
        return $this;
    }

    /**
     * @return Forward
     */
    public function getAlwaysOut()
    {
        return $this->alwaysOut;
    }

    /**
     * @param Forward $alwaysOut
     * @return Branch
     */
    public function setAlwaysOut($alwaysOut)
    {
        $this->alwaysOut = $alwaysOut;
        return $this;
    }

    /**
     * @return Forward
     */
    public function getBusyIn()
    {
        return $this->busyIn;
    }

    /**
     * @param Forward $busyIn
     * @return Branch
     */
    public function setBusyIn($busyIn)
    {
        $this->busyIn = $busyIn;
        return $this;
    }

    /**
     * @return Forward
     */
    public function getBusyOut()
    {
        return $this->busyOut;
    }

    /**
     * @param Forward $busyOut
     * @return Branch
     */
    public function setBusyOut($busyOut)
    {
        $this->busyOut = $busyOut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermitPhone()
    {
        return $this->permitPhone;
    }

    /**
     * @param mixed $permitPhone
     * @return Branch
     */
    public function setPermitPhone($permitPhone)
    {
        $this->permitPhone = $permitPhone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermitMobile()
    {
        return $this->permitMobile;
    }

    /**
     * @param mixed $permitMobile
     * @return Branch
     */
    public function setPermitMobile($permitMobile)
    {
        $this->permitMobile = $permitMobile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermitInternational()
    {
        return $this->permitInternational;
    }

    /**
     * @param mixed $permitInternational
     * @return Branch
     */
    public function setPermitInternational($permitInternational)
    {
        $this->permitInternational = $permitInternational;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param mixed $permissions
     * @return Branch
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
        return $this;
    }


}

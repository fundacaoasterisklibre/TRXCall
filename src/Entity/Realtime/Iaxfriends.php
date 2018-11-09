<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Type\TypeIaxRequireCalltoken;
use App\Entity\Type\TypeIaxTransfer;

/**
 * Iaxfriends
 *
 * @ORM\Table(name="iaxfriends", uniqueConstraints={@ORM\UniqueConstraint(name="iaxfriends_name_key", columns={"name"})}, indexes={@ORM\Index(name="iaxfriends_name_host", columns={"name", "host"}), @ORM\Index(name="iaxfriends_name_ipaddr_port", columns={"name", "ipaddr", "port"}), @ORM\Index(name="iaxfriends_host_port", columns={"host", "port"}), @ORM\Index(name="iaxfriends_name", columns={"name"}), @ORM\Index(name="iaxfriends_ipaddr_port", columns={"ipaddr", "port"})})
 * @ORM\Entity
 */
class Iaxfriends
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeType")
     * @ORM\JoinColumn(name="type", referencedColumnName="name")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=40, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="mailbox", type="string", length=40, nullable=true)
     */
    private $mailbox;

    /**
     * @var string
     *
     * @ORM\Column(name="secret", type="string", length=40, nullable=true)
     */
    private $secret;

    /**
     * @var string
     *
     * @ORM\Column(name="dbsecret", type="string", length=40, nullable=true)
     */
    private $dbsecret;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=40, nullable=true)
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="regcontext", type="string", length=40, nullable=true)
     */
    private $regcontext;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=40, nullable=true)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddr", type="string", length=40, nullable=true)
     */
    private $ipaddr;

    /**
     * @var integer
     *
     * @ORM\Column(name="port", type="integer", nullable=true)
     */
    private $port;

    /**
     * @var string
     *
     * @ORM\Column(name="defaultip", type="string", length=20, nullable=true)
     */
    private $defaultip;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceaddress", type="string", length=20, nullable=true)
     */
    private $sourceaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="mask", type="string", length=20, nullable=true)
     */
    private $mask;

    /**
     * @var string
     *
     * @ORM\Column(name="regexten", type="string", length=40, nullable=true)
     */
    private $regexten;

    /**
     * @var integer
     *
     * @ORM\Column(name="regseconds", type="integer", nullable=true)
     */
    private $regseconds;

    /**
     * @var string
     *
     * @ORM\Column(name="accountcode", type="string", length=80, nullable=true)
     */
    private $accountcode;

    /**
     * @var string
     *
     * @ORM\Column(name="mohinterpret", type="string", length=20, nullable=true)
     */
    private $mohinterpret;

    /**
     * @var string
     *
     * @ORM\Column(name="mohsuggest", type="string", length=20, nullable=true)
     */
    private $mohsuggest;

    /**
     * @var string
     *
     * @ORM\Column(name="inkeys", type="string", length=40, nullable=true)
     */
    private $inkeys;

    /**
     * @var string
     *
     * @ORM\Column(name="outkeys", type="string", length=40, nullable=true)
     */
    private $outkeys;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=10, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="callerid", type="string", length=100, nullable=true)
     */
    private $callerid;

    /**
     * @var string
     *
     * @ORM\Column(name="cid_number", type="string", length=40, nullable=true)
     */
    private $cidNumber;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="sendani", referencedColumnName="name")
     */
    private $sendani;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=40, nullable=true)
     */
    private $fullname;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="trunk", referencedColumnName="name")
     */
    private $trunk;

    /**
     * @var string
     *
     * @ORM\Column(name="auth", type="string", length=20, nullable=true)
     */
    private $auth;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxauthreq", type="integer", nullable=true)
     */
    private $maxauthreq;

    /**
     * @var TypeIaxRequireCalltoken
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeIaxRequireCalltoken")
     * @ORM\JoinColumn(name="requirecalltoken", referencedColumnName="name")
     */
    private $requirecalltoken;

    /**
     * @var TypeIaxEncryption
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeIaxEncryption")
     * @ORM\JoinColumn(name="encryption", referencedColumnName="name")
     */
    private $encryption;

    /**
     * @var TypeIaxTransfer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeIaxTransfer")
     * @ORM\JoinColumn(name="transfer", referencedColumnName="name")
     */
    private $transfer;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="jitterbuffer", referencedColumnName="name")
     */
    private $jitterbuffer;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="forcejitterbuffer", referencedColumnName="name")
     */
    private $forcejitterbuffer;

    /**
     * @var string
     *
     * @ORM\Column(name="disallow", type="string", length=200, nullable=true)
     */
    private $disallow;

    /**
     * @var string
     *
     * @ORM\Column(name="allow", type="string", length=200, nullable=true)
     */
    private $allow;

    /**
     * @var string
     *
     * @ORM\Column(name="codecpriority", type="string", length=40, nullable=true)
     */
    private $codecpriority;

    /**
     * @var string
     *
     * @ORM\Column(name="qualify", type="string", length=10, nullable=true)
     */
    private $qualify;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="qualifysmoothing", referencedColumnName="name")
     */
    private $qualifysmoothing;

    /**
     * @var string
     *
     * @ORM\Column(name="qualifyfreqok", type="string", length=10, nullable=true)
     */
    private $qualifyfreqok;

    /**
     * @var string
     *
     * @ORM\Column(name="qualifyfreqnotok", type="string", length=10, nullable=true)
     */
    private $qualifyfreqnotok;

    /**
     * @var string
     *
     * @ORM\Column(name="timezone", type="string", length=20, nullable=true)
     */
    private $timezone;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="adsi", referencedColumnName="name")
     */
    private $adsi;

    /**
     * @var string
     *
     * @ORM\Column(name="amaflags", type="string", length=20, nullable=true)
     */
    private $amaflags;

    /**
     * @var string
     *
     * @ORM\Column(name="setvar", type="string", length=200, nullable=true)
     */
    private $setvar;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Iaxfriends
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
     * @return Iaxfriends
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param TypeYesNo $type
     * @return Iaxfriends
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Iaxfriends
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailbox()
    {
        return $this->mailbox;
    }

    /**
     * @param string $mailbox
     * @return Iaxfriends
     */
    public function setMailbox($mailbox)
    {
        $this->mailbox = $mailbox;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     * @return Iaxfriends
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getDbsecret()
    {
        return $this->dbsecret;
    }

    /**
     * @param string $dbsecret
     * @return Iaxfriends
     */
    public function setDbsecret($dbsecret)
    {
        $this->dbsecret = $dbsecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     * @return Iaxfriends
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegcontext()
    {
        return $this->regcontext;
    }

    /**
     * @param string $regcontext
     * @return Iaxfriends
     */
    public function setRegcontext($regcontext)
    {
        $this->regcontext = $regcontext;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return Iaxfriends
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpaddr()
    {
        return $this->ipaddr;
    }

    /**
     * @param string $ipaddr
     * @return Iaxfriends
     */
    public function setIpaddr($ipaddr)
    {
        $this->ipaddr = $ipaddr;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return Iaxfriends
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultip()
    {
        return $this->defaultip;
    }

    /**
     * @param string $defaultip
     * @return Iaxfriends
     */
    public function setDefaultip($defaultip)
    {
        $this->defaultip = $defaultip;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceaddress()
    {
        return $this->sourceaddress;
    }

    /**
     * @param string $sourceaddress
     * @return Iaxfriends
     */
    public function setSourceaddress($sourceaddress)
    {
        $this->sourceaddress = $sourceaddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * @param string $mask
     * @return Iaxfriends
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegexten()
    {
        return $this->regexten;
    }

    /**
     * @param string $regexten
     * @return Iaxfriends
     */
    public function setRegexten($regexten)
    {
        $this->regexten = $regexten;
        return $this;
    }

    /**
     * @return int
     */
    public function getRegseconds()
    {
        return $this->regseconds;
    }

    /**
     * @param int $regseconds
     * @return Iaxfriends
     */
    public function setRegseconds($regseconds)
    {
        $this->regseconds = $regseconds;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountcode()
    {
        return $this->accountcode;
    }

    /**
     * @param string $accountcode
     * @return Iaxfriends
     */
    public function setAccountcode($accountcode)
    {
        $this->accountcode = $accountcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getMohinterpret()
    {
        return $this->mohinterpret;
    }

    /**
     * @param string $mohinterpret
     * @return Iaxfriends
     */
    public function setMohinterpret($mohinterpret)
    {
        $this->mohinterpret = $mohinterpret;
        return $this;
    }

    /**
     * @return string
     */
    public function getMohsuggest()
    {
        return $this->mohsuggest;
    }

    /**
     * @param string $mohsuggest
     * @return Iaxfriends
     */
    public function setMohsuggest($mohsuggest)
    {
        $this->mohsuggest = $mohsuggest;
        return $this;
    }

    /**
     * @return string
     */
    public function getInkeys()
    {
        return $this->inkeys;
    }

    /**
     * @param string $inkeys
     * @return Iaxfriends
     */
    public function setInkeys($inkeys)
    {
        $this->inkeys = $inkeys;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutkeys()
    {
        return $this->outkeys;
    }

    /**
     * @param string $outkeys
     * @return Iaxfriends
     */
    public function setOutkeys($outkeys)
    {
        $this->outkeys = $outkeys;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Iaxfriends
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallerid()
    {
        return $this->callerid;
    }

    /**
     * @param string $callerid
     * @return Iaxfriends
     */
    public function setCallerid($callerid)
    {
        $this->callerid = $callerid;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidNumber()
    {
        return $this->cidNumber;
    }

    /**
     * @param string $cidNumber
     * @return Iaxfriends
     */
    public function setCidNumber($cidNumber)
    {
        $this->cidNumber = $cidNumber;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getSendani()
    {
        return $this->sendani;
    }

    /**
     * @param TypeYesNo $sendani
     * @return Iaxfriends
     */
    public function setSendani($sendani)
    {
        $this->sendani = $sendani;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     * @return Iaxfriends
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getTrunk()
    {
        return $this->trunk;
    }

    /**
     * @param TypeYesNo $trunk
     * @return Iaxfriends
     */
    public function setTrunk($trunk)
    {
        $this->trunk = $trunk;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param string $auth
     * @return Iaxfriends
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxauthreq()
    {
        return $this->maxauthreq;
    }

    /**
     * @param int $maxauthreq
     * @return Iaxfriends
     */
    public function setMaxauthreq($maxauthreq)
    {
        $this->maxauthreq = $maxauthreq;
        return $this;
    }

    /**
     * @return TypeIaxRequireCalltoken
     */
    public function getRequirecalltoken()
    {
        return $this->requirecalltoken;
    }

    /**
     * @param TypeIaxRequireCalltoken $requirecalltoken
     * @return Iaxfriends
     */
    public function setRequirecalltoken($requirecalltoken)
    {
        $this->requirecalltoken = $requirecalltoken;
        return $this;
    }

    /**
     * @return TypeIaxEncryption
     */
    public function getEncryption()
    {
        return $this->encryption;
    }

    /**
     * @param TypeIaxEncryption $encryption
     * @return Iaxfriends
     */
    public function setEncryption($encryption)
    {
        $this->encryption = $encryption;
        return $this;
    }

    /**
     * @return TypeIaxTransfer
     */
    public function getTransfer()
    {
        return $this->transfer;
    }

    /**
     * @param TypeIaxTransfer $transfer
     * @return Iaxfriends
     */
    public function setTransfer($transfer)
    {
        $this->transfer = $transfer;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getJitterbuffer()
    {
        return $this->jitterbuffer;
    }

    /**
     * @param TypeYesNo $jitterbuffer
     * @return Iaxfriends
     */
    public function setJitterbuffer($jitterbuffer)
    {
        $this->jitterbuffer = $jitterbuffer;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getForcejitterbuffer()
    {
        return $this->forcejitterbuffer;
    }

    /**
     * @param TypeYesNo $forcejitterbuffer
     * @return Iaxfriends
     */
    public function setForcejitterbuffer($forcejitterbuffer)
    {
        $this->forcejitterbuffer = $forcejitterbuffer;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisallow()
    {
        return $this->disallow;
    }

    /**
     * @param string $disallow
     * @return Iaxfriends
     */
    public function setDisallow($disallow)
    {
        $this->disallow = $disallow;
        return $this;
    }

    /**
     * @return string
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * @param string $allow
     * @return Iaxfriends
     */
    public function setAllow($allow)
    {
        $this->allow = $allow;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodecpriority()
    {
        return $this->codecpriority;
    }

    /**
     * @param string $codecpriority
     * @return Iaxfriends
     */
    public function setCodecpriority($codecpriority)
    {
        $this->codecpriority = $codecpriority;
        return $this;
    }

    /**
     * @return string
     */
    public function getQualify()
    {
        return $this->qualify;
    }

    /**
     * @param string $qualify
     * @return Iaxfriends
     */
    public function setQualify($qualify)
    {
        $this->qualify = $qualify;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getQualifysmoothing()
    {
        return $this->qualifysmoothing;
    }

    /**
     * @param TypeYesNo $qualifysmoothing
     * @return Iaxfriends
     */
    public function setQualifysmoothing($qualifysmoothing)
    {
        $this->qualifysmoothing = $qualifysmoothing;
        return $this;
    }

    /**
     * @return string
     */
    public function getQualifyfreqok()
    {
        return $this->qualifyfreqok;
    }

    /**
     * @param string $qualifyfreqok
     * @return Iaxfriends
     */
    public function setQualifyfreqok($qualifyfreqok)
    {
        $this->qualifyfreqok = $qualifyfreqok;
        return $this;
    }

    /**
     * @return string
     */
    public function getQualifyfreqnotok()
    {
        return $this->qualifyfreqnotok;
    }

    /**
     * @param string $qualifyfreqnotok
     * @return Iaxfriends
     */
    public function setQualifyfreqnotok($qualifyfreqnotok)
    {
        $this->qualifyfreqnotok = $qualifyfreqnotok;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return Iaxfriends
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAdsi()
    {
        return $this->adsi;
    }

    /**
     * @param TypeYesNo $adsi
     * @return Iaxfriends
     */
    public function setAdsi($adsi)
    {
        $this->adsi = $adsi;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmaflags()
    {
        return $this->amaflags;
    }

    /**
     * @param string $amaflags
     * @return Iaxfriends
     */
    public function setAmaflags($amaflags)
    {
        $this->amaflags = $amaflags;
        return $this;
    }

    /**
     * @return string
     */
    public function getSetvar()
    {
        return $this->setvar;
    }

    /**
     * @param string $setvar
     * @return Iaxfriends
     */
    public function setSetvar($setvar)
    {
        $this->setvar = $setvar;
        return $this;
    }

}
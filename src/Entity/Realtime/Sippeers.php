<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\AbstractProtocol;
use App\Entity\Type\TypeYesNo;

/**
 * Sippeers
 *
 * @ORM\Table(name="sippeers", uniqueConstraints={@ORM\UniqueConstraint(name="sippeers_name_key", columns={"name"})}, indexes={@ORM\Index(name="sippeers_name", columns={"name"}), @ORM\Index(name="sippeers_name_host", columns={"name", "host"}), @ORM\Index(name="sippeers_host_port", columns={"host", "port"}), @ORM\Index(name="sippeers_ipaddr_port", columns={"ipaddr", "port"})})
 * @ORM\Entity
 */
class Sippeers extends AbstractProtocol
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddr", type="string", length=45, nullable=true)
     */
    private $ipaddr;

    /**
     * @var integer
     *
     * @ORM\Column(name="port", type="integer", nullable=true)
     */
    private $port;

    /**
     * @var integer
     *
     * @ORM\Column(name="regseconds", type="integer", nullable=true)
     */
    private $regseconds;

    /**
     * @var string
     *
     * @ORM\Column(name="defaultuser", type="string", length=40, nullable=true)
     */
    private $defaultuser;

    /**
     * @var string
     *
     * @ORM\Column(name="fullcontact", type="string", length=80, nullable=true)
     */
    private $fullcontact;

    /**
     * @var string
     *
     * @ORM\Column(name="regserver", type="string", length=20, nullable=true)
     */
    private $regserver;

    /**
     * @var string
     *
     * @ORM\Column(name="useragent", type="string", length=255, nullable=true)
     */
    private $useragent;

    /**
     * @var integer
     *
     * @ORM\Column(name="lastms", type="integer", nullable=true)
     */
    private $lastms;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=40, nullable=true)
     */
    private $host;

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
     * @ORM\Column(name="context", type="string", length=40, nullable=true)
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="permit", type="string", length=95, nullable=true)
     */
    private $permit;

    /**
     * @var string
     *
     * @ORM\Column(name="deny", type="string", length=95, nullable=true)
     */
    private $deny;

    /**
     * @var string
     *
     * @ORM\Column(name="secret", type="string", length=40, nullable=true)
     */
    private $secret;

    /**
     * @var string
     *
     * @ORM\Column(name="md5secret", type="string", length=40, nullable=true)
     */
    private $md5secret;

    /**
     * @var string
     *
     * @ORM\Column(name="remotesecret", type="string", length=40, nullable=true)
     */
    private $remotesecret;

    /**
     * @var TypeSipTransport
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipTransport")
     * @ORM\JoinColumn(name="transport", referencedColumnName="name")
     */
    private $transport;

    /**
     * @var TypeSipDtmfMode
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipDtmfMode")
     * @ORM\JoinColumn(name="dtmfmode", referencedColumnName="name")
     */
    private $dtmfmode;

    /**
     * @var TypeSipDirectMedia
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipDirectMedia")
     * @ORM\JoinColumn(name="directmedia", referencedColumnName="name")
     */
    private $directmedia;

    /**
     * @var TypeSipNat
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipNat")
     * @ORM\JoinColumn(name="nat", referencedColumnName="name")
     */
    private $nat;

    /**
     * @var string
     *
     * @ORM\Column(name="callgroup", type="string", length=40, nullable=true)
     */
    private $callgroup;

    /**
     * @var string
     *
     * @ORM\Column(name="pickupgroup", type="string", length=40, nullable=true)
     */
    private $pickupgroup;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=40, nullable=true)
     */
    private $language;

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
     * @ORM\Column(name="insecure", type="string", length=40, nullable=true)
     */
    private $insecure;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="trustrpid", referencedColumnName="name")
     */
    private $trustrpid;

    /**
     * @var TypeSipProgressInBand
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipProgressInBand")
     * @ORM\JoinColumn(name="progressinband", referencedColumnName="name")
     */
    private $progressinband;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="promiscredir", referencedColumnName="name")
     */
    private $promiscredir;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="useclientcode", referencedColumnName="name")
     */
    private $useclientcode;

    /**
     * @var string
     *
     * @ORM\Column(name="accountcode", type="string", length=80, nullable=true)
     */
    private $accountcode;

    /**
     * @var string
     *
     * @ORM\Column(name="setvar", type="string", length=200, nullable=true)
     */
    private $setvar;

    /**
     * @var string
     *
     * @ORM\Column(name="callerid", type="string", length=40, nullable=true)
     */
    private $callerid;

    /**
     * @var string
     *
     * @ORM\Column(name="amaflags", type="string", length=40, nullable=true)
     */
    private $amaflags;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="callcounter", referencedColumnName="name")
     */
    private $callcounter;

    /**
     * @var integer
     *
     * @ORM\Column(name="busylevel", type="integer", nullable=true)
     */
    private $busylevel;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="allowoverlap", referencedColumnName="name")
     */
    private $allowoverlap;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="allowsubscribe", referencedColumnName="name")
     */
    private $allowsubscribe;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="videosupport", referencedColumnName="name")
     */
    private $videosupport;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxcallbitrate", type="integer", nullable=true)
     */
    private $maxcallbitrate;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="rfc2833compensate", referencedColumnName="name")
     */
    private $rfc2833compensate;

    /**
     * @var string
     *
     * @ORM\Column(name="mailbox", type="string", length=40, nullable=true)
     */
    private $mailbox;

    /**
     * @var TypeSipSessionTimers
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipSessionTimers")
     * @ORM\JoinColumn(name="""session-timers""", referencedColumnName="name")
     */
    private $sessionTimers;

    /**
     * @var integer
     *
     * @ORM\Column(name="""session-expires""", type="integer", nullable=true)
     */
    private $sessionExpires;

    /**
     * @var integer
     *
     * @ORM\Column(name="""session-minse""", type="integer", nullable=true)
     */
    private $sessionMinse;

    /**
     * @var TypeSipSessionRefresher
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipSessionRefresher")
     * @ORM\JoinColumn(name="""session-refresher""", referencedColumnName="name")
     */
    private $sessionRefresher;

    /**
     * @var string
     *
     * @ORM\Column(name="t38pt_usertpsource", type="string", length=40, nullable=true)
     */
    private $t38ptUsertpsource;

    /**
     * @var string
     *
     * @ORM\Column(name="regexten", type="string", length=40, nullable=true)
     */
    private $regexten;

    /**
     * @var string
     *
     * @ORM\Column(name="fromdomain", type="string", length=40, nullable=true)
     */
    private $fromdomain;

    /**
     * @var string
     *
     * @ORM\Column(name="fromuser", type="string", length=40, nullable=true)
     */
    private $fromuser;

    /**
     * @var string
     *
     * @ORM\Column(name="qualify", type="string", length=40, nullable=true)
     */
    private $qualify;

    /**
     * @var string
     *
     * @ORM\Column(name="defaultip", type="string", length=45, nullable=true)
     */
    private $defaultip;

    /**
     * @var integer
     *
     * @ORM\Column(name="rtptimeout", type="integer", nullable=true)
     */
    private $rtptimeout;

    /**
     * @var integer
     *
     * @ORM\Column(name="rtpholdtimeout", type="integer", nullable=true)
     */
    private $rtpholdtimeout;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="sendrpid", referencedColumnName="name")
     */
    private $sendrpid;

    /**
     * @var string
     *
     * @ORM\Column(name="outboundproxy", type="string", length=40, nullable=true)
     */
    private $outboundproxy;

    /**
     * @var string
     *
     * @ORM\Column(name="callbackextension", type="string", length=40, nullable=true)
     */
    private $callbackextension;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="registertrying", referencedColumnName="name")
     */
    private $registertrying;

    /**
     * @var integer
     *
     * @ORM\Column(name="timert1", type="integer", nullable=true)
     */
    private $timert1;

    /**
     * @var integer
     *
     * @ORM\Column(name="timerb", type="integer", nullable=true)
     */
    private $timerb;

    /**
     * @var integer
     *
     * @ORM\Column(name="qualifyfreq", type="integer", nullable=true)
     */
    private $qualifyfreq;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="constantssrc", referencedColumnName="name")
     */
    private $constantssrc;

    /**
     * @var string
     *
     * @ORM\Column(name="contactpermit", type="string", length=95, nullable=true)
     */
    private $contactpermit;

    /**
     * @var string
     *
     * @ORM\Column(name="contactdeny", type="string", length=95, nullable=true)
     */
    private $contactdeny;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="usereqphone", referencedColumnName="name")
     */
    private $usereqphone;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="textsupport", referencedColumnName="name")
     */
    private $textsupport;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="faxdetect", referencedColumnName="name")
     */
    private $faxdetect;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="buggymwi", referencedColumnName="name")
     */
    private $buggymwi;

    /**
     * @var string
     *
     * @ORM\Column(name="auth", type="string", length=40, nullable=true)
     */
    private $auth;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=40, nullable=true)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="trunkname", type="string", length=40, nullable=true)
     */
    private $trunkname;

    /**
     * @var string
     *
     * @ORM\Column(name="cid_number", type="string", length=40, nullable=true)
     */
    private $cidNumber;

    /**
     * @var TypeSipCallingpres
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeSipCallingpres")
     * @ORM\JoinColumn(name="sip_callingpres_values", referencedColumnName="name")
     */
    private $callingpres;

    /**
     * @var string
     *
     * @ORM\Column(name="mohinterpret", type="string", length=40, nullable=true)
     */
    private $mohinterpret;

    /**
     * @var string
     *
     * @ORM\Column(name="mohsuggest", type="string", length=40, nullable=true)
     */
    private $mohsuggest;

    /**
     * @var string
     *
     * @ORM\Column(name="parkinglot", type="string", length=40, nullable=true)
     */
    private $parkinglot;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="hasvoicemail", referencedColumnName="name")
     */
    private $hasvoicemail;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="subscribemwi", referencedColumnName="name")
     */
    private $subscribemwi;

    /**
     * @var string
     *
     * @ORM\Column(name="vmexten", type="string", length=40, nullable=true)
     */
    private $vmexten;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="autoframing", referencedColumnName="name")
     */
    private $autoframing;

    /**
     * @var integer
     *
     * @ORM\Column(name="rtpkeepalive", type="integer", nullable=true)
     */
    private $rtpkeepalive;

    /**
     * @var integer
     *
     * @ORM\Column(name="""call-limit""", type="integer", nullable=true)
     */
    private $callLimit;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="g726nonstandard", referencedColumnName="name")
     */
    private $g726nonstandard;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="ignoresdpversion", referencedColumnName="name")
     */
    private $ignoresdpversion;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="allowtransfer", referencedColumnName="name")
     */
    private $allowtransfer;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="dynamic", referencedColumnName="name")
     */
    private $dynamic;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Sippeers
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Sippeers
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
     * @return Sippeers
     */
    public function setPort($port)
    {
        $this->port = $port;
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
     * @return Sippeers
     */
    public function setRegseconds($regseconds)
    {
        $this->regseconds = $regseconds;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultuser()
    {
        return $this->defaultuser;
    }

    /**
     * @param string $defaultuser
     * @return Sippeers
     */
    public function setDefaultuser($defaultuser)
    {
        $this->defaultuser = $defaultuser;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullcontact()
    {
        return $this->fullcontact;
    }

    /**
     * @param string $fullcontact
     * @return Sippeers
     */
    public function setFullcontact($fullcontact)
    {
        $this->fullcontact = $fullcontact;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegserver()
    {
        return $this->regserver;
    }

    /**
     * @param string $regserver
     * @return Sippeers
     */
    public function setRegserver($regserver)
    {
        $this->regserver = $regserver;
        return $this;
    }

    /**
     * @return string
     */
    public function getUseragent()
    {
        return $this->useragent;
    }

    /**
     * @param string $useragent
     * @return Sippeers
     */
    public function setUseragent($useragent)
    {
        $this->useragent = $useragent;
        return $this;
    }

    /**
     * @return int
     */
    public function getLastms()
    {
        return $this->lastms;
    }

    /**
     * @param int $lastms
     * @return Sippeers
     */
    public function setLastms($lastms)
    {
        $this->lastms = $lastms;
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
     * @return Sippeers
     */
    public function setHost($host)
    {
        $this->host = $host;
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
     * @return Sippeers
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return Sippeers
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return string
     */
    public function getPermit()
    {
        return $this->permit;
    }

    /**
     * @param string $permit
     * @return Sippeers
     */
    public function setPermit($permit)
    {
        $this->permit = $permit;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeny()
    {
        return $this->deny;
    }

    /**
     * @param string $deny
     * @return Sippeers
     */
    public function setDeny($deny)
    {
        $this->deny = $deny;
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
     * @return Sippeers
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getMd5secret()
    {
        return $this->md5secret;
    }

    /**
     * @param string $md5secret
     * @return Sippeers
     */
    public function setMd5secret($md5secret)
    {
        $this->md5secret = $md5secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemotesecret()
    {
        return $this->remotesecret;
    }

    /**
     * @param string $remotesecret
     * @return Sippeers
     */
    public function setRemotesecret($remotesecret)
    {
        $this->remotesecret = $remotesecret;
        return $this;
    }

    /**
     * @return TypeSipTransport
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param TypeSipTransport $transport
     * @return Sippeers
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * @return TypeSipDtmfMode
     */
    public function getDtmfmode()
    {
        return $this->dtmfmode;
    }

    /**
     * @param TypeSipDtmfMode $dtmfmode
     * @return Sippeers
     */
    public function setDtmfmode($dtmfmode)
    {
        $this->dtmfmode = $dtmfmode;
        return $this;
    }

    /**
     * @return TypeSipDirectMedia
     */
    public function getDirectmedia()
    {
        return $this->directmedia;
    }

    /**
     * @param TypeSipDirectMedia $directmedia
     * @return Sippeers
     */
    public function setDirectmedia($directmedia)
    {
        $this->directmedia = $directmedia;
        return $this;
    }

    /**
     * @return TypeSipNat
     */
    public function getNat()
    {
        return $this->nat;
    }

    /**
     * @param TypeSipNat $nat
     * @return Sippeers
     */
    public function setNat($nat)
    {
        $this->nat = $nat;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallgroup()
    {
        return $this->callgroup;
    }

    /**
     * @param string $callgroup
     * @return Sippeers
     */
    public function setCallgroup($callgroup)
    {
        $this->callgroup = $callgroup;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupgroup()
    {
        return $this->pickupgroup;
    }

    /**
     * @param string $pickupgroup
     * @return Sippeers
     */
    public function setPickupgroup($pickupgroup)
    {
        $this->pickupgroup = $pickupgroup;
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
     * @return Sippeers
     */
    public function setLanguage($language)
    {
        $this->language = $language;
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
     * @return Sippeers
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
     * @return Sippeers
     */
    public function setAllow($allow)
    {
        $this->allow = $allow;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsecure()
    {
        return $this->insecure;
    }

    /**
     * @param string $insecure
     * @return Sippeers
     */
    public function setInsecure($insecure)
    {
        $this->insecure = $insecure;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getTrustrpid()
    {
        return $this->trustrpid;
    }

    /**
     * @param TypeYesNo $trustrpid
     * @return Sippeers
     */
    public function setTrustrpid($trustrpid)
    {
        $this->trustrpid = $trustrpid;
        return $this;
    }

    /**
     * @return TypeSipProgressInBand
     */
    public function getProgressinband()
    {
        return $this->progressinband;
    }

    /**
     * @param TypeSipProgressInBand $progressinband
     * @return Sippeers
     */
    public function setProgressinband($progressinband)
    {
        $this->progressinband = $progressinband;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getPromiscredir()
    {
        return $this->promiscredir;
    }

    /**
     * @param TypeYesNo $promiscredir
     * @return Sippeers
     */
    public function setPromiscredir($promiscredir)
    {
        $this->promiscredir = $promiscredir;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getUseclientcode()
    {
        return $this->useclientcode;
    }

    /**
     * @param TypeYesNo $useclientcode
     * @return Sippeers
     */
    public function setUseclientcode($useclientcode)
    {
        $this->useclientcode = $useclientcode;
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
     * @return Sippeers
     */
    public function setAccountcode($accountcode)
    {
        $this->accountcode = $accountcode;
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
     * @return Sippeers
     */
    public function setSetvar($setvar)
    {
        $this->setvar = $setvar;
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
     * @return Sippeers
     */
    public function setCallerid($callerid)
    {
        $this->callerid = $callerid;
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
     * @return Sippeers
     */
    public function setAmaflags($amaflags)
    {
        $this->amaflags = $amaflags;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getCallcounter()
    {
        return $this->callcounter;
    }

    /**
     * @param TypeYesNo $callcounter
     * @return Sippeers
     */
    public function setCallcounter($callcounter)
    {
        $this->callcounter = $callcounter;
        return $this;
    }

    /**
     * @return int
     */
    public function getBusylevel()
    {
        return $this->busylevel;
    }

    /**
     * @param int $busylevel
     * @return Sippeers
     */
    public function setBusylevel($busylevel)
    {
        $this->busylevel = $busylevel;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAllowoverlap()
    {
        return $this->allowoverlap;
    }

    /**
     * @param TypeYesNo $allowoverlap
     * @return Sippeers
     */
    public function setAllowoverlap($allowoverlap)
    {
        $this->allowoverlap = $allowoverlap;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAllowsubscribe()
    {
        return $this->allowsubscribe;
    }

    /**
     * @param TypeYesNo $allowsubscribe
     * @return Sippeers
     */
    public function setAllowsubscribe($allowsubscribe)
    {
        $this->allowsubscribe = $allowsubscribe;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getVideosupport()
    {
        return $this->videosupport;
    }

    /**
     * @param TypeYesNo $videosupport
     * @return Sippeers
     */
    public function setVideosupport($videosupport)
    {
        $this->videosupport = $videosupport;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxcallbitrate()
    {
        return $this->maxcallbitrate;
    }

    /**
     * @param int $maxcallbitrate
     * @return Sippeers
     */
    public function setMaxcallbitrate($maxcallbitrate)
    {
        $this->maxcallbitrate = $maxcallbitrate;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getRfc2833compensate()
    {
        return $this->rfc2833compensate;
    }

    /**
     * @param TypeYesNo $rfc2833compensate
     * @return Sippeers
     */
    public function setRfc2833compensate($rfc2833compensate)
    {
        $this->rfc2833compensate = $rfc2833compensate;
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
     * @return Sippeers
     */
    public function setMailbox($mailbox)
    {
        $this->mailbox = $mailbox;
        return $this;
    }

    /**
     * @return TypeSipSessionTimers
     */
    public function getSessionTimers()
    {
        return $this->sessionTimers;
    }

    /**
     * @param TypeSipSessionTimers $sessionTimers
     * @return Sippeers
     */
    public function setSessionTimers($sessionTimers)
    {
        $this->sessionTimers = $sessionTimers;
        return $this;
    }

    /**
     * @return int
     */
    public function getSessionExpires()
    {
        return $this->sessionExpires;
    }

    /**
     * @param int $sessionExpires
     * @return Sippeers
     */
    public function setSessionExpires($sessionExpires)
    {
        $this->sessionExpires = $sessionExpires;
        return $this;
    }

    /**
     * @return int
     */
    public function getSessionMinse()
    {
        return $this->sessionMinse;
    }

    /**
     * @param int $sessionMinse
     * @return Sippeers
     */
    public function setSessionMinse($sessionMinse)
    {
        $this->sessionMinse = $sessionMinse;
        return $this;
    }

    /**
     * @return TypeSipSessionRefresher
     */
    public function getSessionRefresher()
    {
        return $this->sessionRefresher;
    }

    /**
     * @param TypeSipSessionRefresher $sessionRefresher
     * @return Sippeers
     */
    public function setSessionRefresher($sessionRefresher)
    {
        $this->sessionRefresher = $sessionRefresher;
        return $this;
    }

    /**
     * @return string
     */
    public function getT38ptUsertpsource()
    {
        return $this->t38ptUsertpsource;
    }

    /**
     * @param string $t38ptUsertpsource
     * @return Sippeers
     */
    public function setT38ptUsertpsource($t38ptUsertpsource)
    {
        $this->t38ptUsertpsource = $t38ptUsertpsource;
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
     * @return Sippeers
     */
    public function setRegexten($regexten)
    {
        $this->regexten = $regexten;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromdomain()
    {
        return $this->fromdomain;
    }

    /**
     * @param string $fromdomain
     * @return Sippeers
     */
    public function setFromdomain($fromdomain)
    {
        $this->fromdomain = $fromdomain;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromuser()
    {
        return $this->fromuser;
    }

    /**
     * @param string $fromuser
     * @return Sippeers
     */
    public function setFromuser($fromuser)
    {
        $this->fromuser = $fromuser;
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
     * @return Sippeers
     */
    public function setQualify($qualify)
    {
        $this->qualify = $qualify;
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
     * @return Sippeers
     */
    public function setDefaultip($defaultip)
    {
        $this->defaultip = $defaultip;
        return $this;
    }

    /**
     * @return int
     */
    public function getRtptimeout()
    {
        return $this->rtptimeout;
    }

    /**
     * @param int $rtptimeout
     * @return Sippeers
     */
    public function setRtptimeout($rtptimeout)
    {
        $this->rtptimeout = $rtptimeout;
        return $this;
    }

    /**
     * @return int
     */
    public function getRtpholdtimeout()
    {
        return $this->rtpholdtimeout;
    }

    /**
     * @param int $rtpholdtimeout
     * @return Sippeers
     */
    public function setRtpholdtimeout($rtpholdtimeout)
    {
        $this->rtpholdtimeout = $rtpholdtimeout;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getSendrpid()
    {
        return $this->sendrpid;
    }

    /**
     * @param TypeYesNo $sendrpid
     * @return Sippeers
     */
    public function setSendrpid($sendrpid)
    {
        $this->sendrpid = $sendrpid;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutboundproxy()
    {
        return $this->outboundproxy;
    }

    /**
     * @param string $outboundproxy
     * @return Sippeers
     */
    public function setOutboundproxy($outboundproxy)
    {
        $this->outboundproxy = $outboundproxy;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallbackextension()
    {
        return $this->callbackextension;
    }

    /**
     * @param string $callbackextension
     * @return Sippeers
     */
    public function setCallbackextension($callbackextension)
    {
        $this->callbackextension = $callbackextension;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getRegistertrying()
    {
        return $this->registertrying;
    }

    /**
     * @param TypeYesNo $registertrying
     * @return Sippeers
     */
    public function setRegistertrying($registertrying)
    {
        $this->registertrying = $registertrying;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimert1()
    {
        return $this->timert1;
    }

    /**
     * @param int $timert1
     * @return Sippeers
     */
    public function setTimert1($timert1)
    {
        $this->timert1 = $timert1;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimerb()
    {
        return $this->timerb;
    }

    /**
     * @param int $timerb
     * @return Sippeers
     */
    public function setTimerb($timerb)
    {
        $this->timerb = $timerb;
        return $this;
    }

    /**
     * @return int
     */
    public function getQualifyfreq()
    {
        return $this->qualifyfreq;
    }

    /**
     * @param int $qualifyfreq
     * @return Sippeers
     */
    public function setQualifyfreq($qualifyfreq)
    {
        $this->qualifyfreq = $qualifyfreq;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getConstantssrc()
    {
        return $this->constantssrc;
    }

    /**
     * @param TypeYesNo $constantssrc
     * @return Sippeers
     */
    public function setConstantssrc($constantssrc)
    {
        $this->constantssrc = $constantssrc;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactpermit()
    {
        return $this->contactpermit;
    }

    /**
     * @param string $contactpermit
     * @return Sippeers
     */
    public function setContactpermit($contactpermit)
    {
        $this->contactpermit = $contactpermit;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactdeny()
    {
        return $this->contactdeny;
    }

    /**
     * @param string $contactdeny
     * @return Sippeers
     */
    public function setContactdeny($contactdeny)
    {
        $this->contactdeny = $contactdeny;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getUsereqphone()
    {
        return $this->usereqphone;
    }

    /**
     * @param TypeYesNo $usereqphone
     * @return Sippeers
     */
    public function setUsereqphone($usereqphone)
    {
        $this->usereqphone = $usereqphone;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getTextsupport()
    {
        return $this->textsupport;
    }

    /**
     * @param TypeYesNo $textsupport
     * @return Sippeers
     */
    public function setTextsupport($textsupport)
    {
        $this->textsupport = $textsupport;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getFaxdetect()
    {
        return $this->faxdetect;
    }

    /**
     * @param TypeYesNo $faxdetect
     * @return Sippeers
     */
    public function setFaxdetect($faxdetect)
    {
        $this->faxdetect = $faxdetect;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getBuggymwi()
    {
        return $this->buggymwi;
    }

    /**
     * @param TypeYesNo $buggymwi
     * @return Sippeers
     */
    public function setBuggymwi($buggymwi)
    {
        $this->buggymwi = $buggymwi;
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
     * @return Sippeers
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
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
     * @return Sippeers
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrunkname()
    {
        return $this->trunkname;
    }

    /**
     * @param string $trunkname
     * @return Sippeers
     */
    public function setTrunkname($trunkname)
    {
        $this->trunkname = $trunkname;
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
     * @return Sippeers
     */
    public function setCidNumber($cidNumber)
    {
        $this->cidNumber = $cidNumber;
        return $this;
    }

    /**
     * @return TypeSipCallingpres
     */
    public function getCallingpres()
    {
        return $this->callingpres;
    }

    /**
     * @param TypeSipCallingpres $callingpres
     * @return Sippeers
     */
    public function setCallingpres($callingpres)
    {
        $this->callingpres = $callingpres;
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
     * @return Sippeers
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
     * @return Sippeers
     */
    public function setMohsuggest($mohsuggest)
    {
        $this->mohsuggest = $mohsuggest;
        return $this;
    }

    /**
     * @return string
     */
    public function getParkinglot()
    {
        return $this->parkinglot;
    }

    /**
     * @param string $parkinglot
     * @return Sippeers
     */
    public function setParkinglot($parkinglot)
    {
        $this->parkinglot = $parkinglot;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getHasvoicemail()
    {
        return $this->hasvoicemail;
    }

    /**
     * @param TypeYesNo $hasvoicemail
     * @return Sippeers
     */
    public function setHasvoicemail($hasvoicemail)
    {
        $this->hasvoicemail = $hasvoicemail;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getSubscribemwi()
    {
        return $this->subscribemwi;
    }

    /**
     * @param TypeYesNo $subscribemwi
     * @return Sippeers
     */
    public function setSubscribemwi($subscribemwi)
    {
        $this->subscribemwi = $subscribemwi;
        return $this;
    }

    /**
     * @return string
     */
    public function getVmexten()
    {
        return $this->vmexten;
    }

    /**
     * @param string $vmexten
     * @return Sippeers
     */
    public function setVmexten($vmexten)
    {
        $this->vmexten = $vmexten;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAutoframing()
    {
        return $this->autoframing;
    }

    /**
     * @param TypeYesNo $autoframing
     * @return Sippeers
     */
    public function setAutoframing($autoframing)
    {
        $this->autoframing = $autoframing;
        return $this;
    }

    /**
     * @return int
     */
    public function getRtpkeepalive()
    {
        return $this->rtpkeepalive;
    }

    /**
     * @param int $rtpkeepalive
     * @return Sippeers
     */
    public function setRtpkeepalive($rtpkeepalive)
    {
        $this->rtpkeepalive = $rtpkeepalive;
        return $this;
    }

    /**
     * @return int
     */
    public function getCallLimit()
    {
        return $this->callLimit;
    }

    /**
     * @param int $callLimit
     * @return Sippeers
     */
    public function setCallLimit($callLimit)
    {
        $this->callLimit = $callLimit;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getG726nonstandard()
    {
        return $this->g726nonstandard;
    }

    /**
     * @param TypeYesNo $g726nonstandard
     * @return Sippeers
     */
    public function setG726nonstandard($g726nonstandard)
    {
        $this->g726nonstandard = $g726nonstandard;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getIgnoresdpversion()
    {
        return $this->ignoresdpversion;
    }

    /**
     * @param TypeYesNo $ignoresdpversion
     * @return Sippeers
     */
    public function setIgnoresdpversion($ignoresdpversion)
    {
        $this->ignoresdpversion = $ignoresdpversion;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAllowtransfer()
    {
        return $this->allowtransfer;
    }

    /**
     * @param TypeYesNo $allowtransfer
     * @return Sippeers
     */
    public function setAllowtransfer($allowtransfer)
    {
        $this->allowtransfer = $allowtransfer;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getDynamic()
    {
        return $this->dynamic;
    }

    /**
     * @param TypeYesNo $dynamic
     * @return Sippeers
     */
    public function setDynamic($dynamic)
    {
        $this->dynamic = $dynamic;
        return $this;
    }

}

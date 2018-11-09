<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Queue
 *
 * @ORM\Table(name="queues")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */
class Queue
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="QueueMember", mappedBy="queue", cascade={"persist", "merge", "remove"})
     */
    private $members;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="musiconhold", type="string", length=128, nullable=true)
     */
    private $musiconhold;

    /**
     * @var string
     *
     * @ORM\Column(name="announce", type="string", length=128, nullable=true)
     */
    private $announce;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=128, nullable=true)
     */
    private $context;

    /**
     * @var integer
     *
     * @ORM\Column(name="timeout", type="integer", nullable=true)
     */
    private $timeout;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="ringinuse", referencedColumnName="name")
     */
    private $ringinuse;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="setinterfacevar", referencedColumnName="name")
     */
    private $setinterfacevar;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="setqueuevar", referencedColumnName="name")
     */
    private $setqueuevar;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="setqueueentryvar", referencedColumnName="name")
     */
    private $setqueueentryvar;

    /**
     * @var string
     *
     * @ORM\Column(name="monitor_format", type="string", length=8, nullable=true)
     */
    private $monitorFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="membermacro", type="string", length=512, nullable=true)
     */
    private $membermacro;

    /**
     * @var string
     *
     * @ORM\Column(name="membergosub", type="string", length=512, nullable=true)
     */
    private $membergosub;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_youarenext", type="string", length=128, nullable=true)
     */
    private $queueYouarenext;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_thereare", type="string", length=128, nullable=true)
     */
    private $queueThereare;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_callswaiting", type="string", length=128, nullable=true)
     */
    private $queueCallswaiting;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_quantity1", type="string", length=128, nullable=true)
     */
    private $queueQuantity1;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_quantity2", type="string", length=128, nullable=true)
     */
    private $queueQuantity2;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_holdtime", type="string", length=128, nullable=true)
     */
    private $queueHoldtime;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_minutes", type="string", length=128, nullable=true)
     */
    private $queueMinutes;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_minute", type="string", length=128, nullable=true)
     */
    private $queueMinute;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_seconds", type="string", length=128, nullable=true)
     */
    private $queueSeconds;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_thankyou", type="string", length=128, nullable=true)
     */
    private $queueThankyou;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_callerannounce", type="string", length=128, nullable=true)
     */
    private $queueCallerannounce;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_reporthold", type="string", length=128, nullable=true)
     */
    private $queueReporthold;

    /**
     * @var integer
     *
     * @ORM\Column(name="announce_frequency", type="integer", nullable=true)
     */
    private $announceFrequency;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="announce_to_first_user", referencedColumnName="name")
     */
    private $announceToFirstUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="min_announce_frequency", type="integer", nullable=true)
     */
    private $minAnnounceFrequency;

    /**
     * @var integer
     *
     * @ORM\Column(name="announce_round_seconds", type="integer", nullable=true)
     */
    private $announceRoundSeconds;

    /**
     * @var string
     *
     * @ORM\Column(name="announce_holdtime", type="string", length=128, nullable=true)
     */
    private $announceHoldtime;

    /**
     * @var string
     *
     * @ORM\Column(name="announce_position", type="string", length=128, nullable=true)
     */
    private $announcePosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="announce_position_limit", type="integer", nullable=true)
     */
    private $announcePositionLimit;

    /**
     * @var string
     *
     * @ORM\Column(name="periodic_announce", type="string", length=50, nullable=true)
     */
    private $periodicAnnounce;

    /**
     * @var integer
     *
     * @ORM\Column(name="periodic_announce_frequency", type="integer", nullable=true)
     */
    private $periodicAnnounceFrequency;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="relative_periodic_announce", referencedColumnName="name")
     */
    private $relativePeriodicAnnounce;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="random_periodic_announce", referencedColumnName="name")
     */
    private $randomPeriodicAnnounce;

    /**
     * @var integer
     *
     * @ORM\Column(name="retry", type="integer", nullable=true)
     */
    private $retry;

    /**
     * @var integer
     *
     * @ORM\Column(name="wrapuptime", type="integer", nullable=true)
     */
    private $wrapuptime;

    /**
     * @var integer
     *
     * @ORM\Column(name="penaltymemberslimit", type="integer", nullable=true)
     */
    private $penaltymemberslimit;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="autofill", referencedColumnName="name")
     */
    private $autofill;

    /**
     * @var string
     *
     * @ORM\Column(name="monitor_type", type="string", length=128, nullable=true)
     */
    private $monitorType;

    /**
     * @var TypeQueueAutoPause
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeQueueAutoPause")
     * @ORM\JoinColumn(name="autopause", referencedColumnName="name")
     */
    private $autopause;

    /**
     * @var integer
     *
     * @ORM\Column(name="autopausedelay", type="integer", nullable=true)
     */
    private $autopausedelay;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="autopausebusy", referencedColumnName="name")
     */
    private $autopausebusy;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="autopauseunavail", referencedColumnName="name")
     */
    private $autopauseunavail;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxlen", type="integer", nullable=true)
     */
    private $maxlen;

    /**
     * @var integer
     *
     * @ORM\Column(name="servicelevel", type="integer", nullable=true)
     */
    private $servicelevel;

    /**
     * @var TypeQueueStrategy
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeQueueStrategy")
     * @ORM\JoinColumn(name="strategy", referencedColumnName="value")
     */
    private $strategy;

    /**
     * @var string
     *
     * @ORM\Column(name="joinempty", type="string", length=128, nullable=true)
     */
    private $joinempty;

    /**
     * @var string
     *
     * @ORM\Column(name="leavewhenempty", type="string", length=128, nullable=true)
     */
    private $leavewhenempty;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="reportholdtime", referencedColumnName="name")
     */
    private $reportholdtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="memberdelay", type="integer", nullable=true)
     */
    private $memberdelay;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="timeoutrestart", referencedColumnName="name")
     */
    private $timeoutrestart;

    /**
     * @var string
     *
     * @ORM\Column(name="defaultrule", type="string", length=128, nullable=true)
     */
    private $defaultrule;

    /**
     * @var string
     *
     * @ORM\Column(name="timeoutpriority", type="string", length=128, nullable=true)
     */
    private $timeoutpriority;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Queue
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $members
     * @return Queue
     */
    public function setMembers($members)
    {
        $this->members = $members;
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
     * @return Queue
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getMusiconhold()
    {
        return $this->musiconhold;
    }

    /**
     * @param string $musiconhold
     * @return Queue
     */
    public function setMusiconhold($musiconhold)
    {
        $this->musiconhold = $musiconhold;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnounce()
    {
        return $this->announce;
    }

    /**
     * @param string $announce
     * @return Queue
     */
    public function setAnnounce($announce)
    {
        $this->announce = $announce;
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
     * @return Queue
     */
    public function setContext($context)
    {
        $this->context = $context;
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
     * @return Queue
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getRinginuse()
    {
        return $this->ringinuse;
    }

    /**
     * @param TypeYesNo $ringinuse
     * @return Queue
     */
    public function setRinginuse($ringinuse)
    {
        $this->ringinuse = $ringinuse;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getSetinterfacevar()
    {
        return $this->setinterfacevar;
    }

    /**
     * @param TypeYesNo $setinterfacevar
     * @return Queue
     */
    public function setSetinterfacevar($setinterfacevar)
    {
        $this->setinterfacevar = $setinterfacevar;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getSetqueuevar()
    {
        return $this->setqueuevar;
    }

    /**
     * @param TypeYesNo $setqueuevar
     * @return Queue
     */
    public function setSetqueuevar($setqueuevar)
    {
        $this->setqueuevar = $setqueuevar;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getSetqueueentryvar()
    {
        return $this->setqueueentryvar;
    }

    /**
     * @param TypeYesNo $setqueueentryvar
     * @return Queue
     */
    public function setSetqueueentryvar($setqueueentryvar)
    {
        $this->setqueueentryvar = $setqueueentryvar;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonitorFormat()
    {
        return $this->monitorFormat;
    }

    /**
     * @param string $monitorFormat
     * @return Queue
     */
    public function setMonitorFormat($monitorFormat)
    {
        $this->monitorFormat = $monitorFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getMembermacro()
    {
        return $this->membermacro;
    }

    /**
     * @param string $membermacro
     * @return Queue
     */
    public function setMembermacro($membermacro)
    {
        $this->membermacro = $membermacro;
        return $this;
    }

    /**
     * @return string
     */
    public function getMembergosub()
    {
        return $this->membergosub;
    }

    /**
     * @param string $membergosub
     * @return Queue
     */
    public function setMembergosub($membergosub)
    {
        $this->membergosub = $membergosub;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueYouarenext()
    {
        return $this->queueYouarenext;
    }

    /**
     * @param string $queueYouarenext
     * @return Queue
     */
    public function setQueueYouarenext($queueYouarenext)
    {
        $this->queueYouarenext = $queueYouarenext;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueThereare()
    {
        return $this->queueThereare;
    }

    /**
     * @param string $queueThereare
     * @return Queue
     */
    public function setQueueThereare($queueThereare)
    {
        $this->queueThereare = $queueThereare;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueCallswaiting()
    {
        return $this->queueCallswaiting;
    }

    /**
     * @param string $queueCallswaiting
     * @return Queue
     */
    public function setQueueCallswaiting($queueCallswaiting)
    {
        $this->queueCallswaiting = $queueCallswaiting;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueQuantity1()
    {
        return $this->queueQuantity1;
    }

    /**
     * @param string $queueQuantity1
     * @return Queue
     */
    public function setQueueQuantity1($queueQuantity1)
    {
        $this->queueQuantity1 = $queueQuantity1;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueQuantity2()
    {
        return $this->queueQuantity2;
    }

    /**
     * @param string $queueQuantity2
     * @return Queue
     */
    public function setQueueQuantity2($queueQuantity2)
    {
        $this->queueQuantity2 = $queueQuantity2;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueHoldtime()
    {
        return $this->queueHoldtime;
    }

    /**
     * @param string $queueHoldtime
     * @return Queue
     */
    public function setQueueHoldtime($queueHoldtime)
    {
        $this->queueHoldtime = $queueHoldtime;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueMinutes()
    {
        return $this->queueMinutes;
    }

    /**
     * @param string $queueMinutes
     * @return Queue
     */
    public function setQueueMinutes($queueMinutes)
    {
        $this->queueMinutes = $queueMinutes;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueMinute()
    {
        return $this->queueMinute;
    }

    /**
     * @param string $queueMinute
     * @return Queue
     */
    public function setQueueMinute($queueMinute)
    {
        $this->queueMinute = $queueMinute;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueSeconds()
    {
        return $this->queueSeconds;
    }

    /**
     * @param string $queueSeconds
     * @return Queue
     */
    public function setQueueSeconds($queueSeconds)
    {
        $this->queueSeconds = $queueSeconds;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueThankyou()
    {
        return $this->queueThankyou;
    }

    /**
     * @param string $queueThankyou
     * @return Queue
     */
    public function setQueueThankyou($queueThankyou)
    {
        $this->queueThankyou = $queueThankyou;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueCallerannounce()
    {
        return $this->queueCallerannounce;
    }

    /**
     * @param string $queueCallerannounce
     * @return Queue
     */
    public function setQueueCallerannounce($queueCallerannounce)
    {
        $this->queueCallerannounce = $queueCallerannounce;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueueReporthold()
    {
        return $this->queueReporthold;
    }

    /**
     * @param string $queueReporthold
     * @return Queue
     */
    public function setQueueReporthold($queueReporthold)
    {
        $this->queueReporthold = $queueReporthold;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnnounceFrequency()
    {
        return $this->announceFrequency;
    }

    /**
     * @param int $announceFrequency
     * @return Queue
     */
    public function setAnnounceFrequency($announceFrequency)
    {
        $this->announceFrequency = $announceFrequency;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAnnounceToFirstUser()
    {
        return $this->announceToFirstUser;
    }

    /**
     * @param TypeYesNo $announceToFirstUser
     * @return Queue
     */
    public function setAnnounceToFirstUser($announceToFirstUser)
    {
        $this->announceToFirstUser = $announceToFirstUser;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinAnnounceFrequency()
    {
        return $this->minAnnounceFrequency;
    }

    /**
     * @param int $minAnnounceFrequency
     * @return Queue
     */
    public function setMinAnnounceFrequency($minAnnounceFrequency)
    {
        $this->minAnnounceFrequency = $minAnnounceFrequency;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnnounceRoundSeconds()
    {
        return $this->announceRoundSeconds;
    }

    /**
     * @param int $announceRoundSeconds
     * @return Queue
     */
    public function setAnnounceRoundSeconds($announceRoundSeconds)
    {
        $this->announceRoundSeconds = $announceRoundSeconds;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnounceHoldtime()
    {
        return $this->announceHoldtime;
    }

    /**
     * @param string $announceHoldtime
     * @return Queue
     */
    public function setAnnounceHoldtime($announceHoldtime)
    {
        $this->announceHoldtime = $announceHoldtime;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnouncePosition()
    {
        return $this->announcePosition;
    }

    /**
     * @param string $announcePosition
     * @return Queue
     */
    public function setAnnouncePosition($announcePosition)
    {
        $this->announcePosition = $announcePosition;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnnouncePositionLimit()
    {
        return $this->announcePositionLimit;
    }

    /**
     * @param int $announcePositionLimit
     * @return Queue
     */
    public function setAnnouncePositionLimit($announcePositionLimit)
    {
        $this->announcePositionLimit = $announcePositionLimit;
        return $this;
    }

    /**
     * @return string
     */
    public function getPeriodicAnnounce()
    {
        return $this->periodicAnnounce;
    }

    /**
     * @param string $periodicAnnounce
     * @return Queue
     */
    public function setPeriodicAnnounce($periodicAnnounce)
    {
        $this->periodicAnnounce = $periodicAnnounce;
        return $this;
    }

    /**
     * @return int
     */
    public function getPeriodicAnnounceFrequency()
    {
        return $this->periodicAnnounceFrequency;
    }

    /**
     * @param int $periodicAnnounceFrequency
     * @return Queue
     */
    public function setPeriodicAnnounceFrequency($periodicAnnounceFrequency)
    {
        $this->periodicAnnounceFrequency = $periodicAnnounceFrequency;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getRelativePeriodicAnnounce()
    {
        return $this->relativePeriodicAnnounce;
    }

    /**
     * @param TypeYesNo $relativePeriodicAnnounce
     * @return Queue
     */
    public function setRelativePeriodicAnnounce($relativePeriodicAnnounce)
    {
        $this->relativePeriodicAnnounce = $relativePeriodicAnnounce;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getRandomPeriodicAnnounce()
    {
        return $this->randomPeriodicAnnounce;
    }

    /**
     * @param TypeYesNo $randomPeriodicAnnounce
     * @return Queue
     */
    public function setRandomPeriodicAnnounce($randomPeriodicAnnounce)
    {
        $this->randomPeriodicAnnounce = $randomPeriodicAnnounce;
        return $this;
    }

    /**
     * @return int
     */
    public function getRetry()
    {
        return $this->retry;
    }

    /**
     * @param int $retry
     * @return Queue
     */
    public function setRetry($retry)
    {
        $this->retry = $retry;
        return $this;
    }

    /**
     * @return int
     */
    public function getWrapuptime()
    {
        return $this->wrapuptime;
    }

    /**
     * @param int $wrapuptime
     * @return Queue
     */
    public function setWrapuptime($wrapuptime)
    {
        $this->wrapuptime = $wrapuptime;
        return $this;
    }

    /**
     * @return int
     */
    public function getPenaltymemberslimit()
    {
        return $this->penaltymemberslimit;
    }

    /**
     * @param int $penaltymemberslimit
     * @return Queue
     */
    public function setPenaltymemberslimit($penaltymemberslimit)
    {
        $this->penaltymemberslimit = $penaltymemberslimit;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAutofill()
    {
        return $this->autofill;
    }

    /**
     * @param TypeYesNo $autofill
     * @return Queue
     */
    public function setAutofill($autofill)
    {
        $this->autofill = $autofill;
        return $this;
    }

    /**
     * @return string
     */
    public function getMonitorType()
    {
        return $this->monitorType;
    }

    /**
     * @param string $monitorType
     * @return Queue
     */
    public function setMonitorType($monitorType)
    {
        $this->monitorType = $monitorType;
        return $this;
    }

    /**
     * @return TypeQueueAutoPause
     */
    public function getAutopause()
    {
        return $this->autopause;
    }

    /**
     * @param TypeQueueAutoPause $autopause
     * @return Queue
     */
    public function setAutopause($autopause)
    {
        $this->autopause = $autopause;
        return $this;
    }

    /**
     * @return int
     */
    public function getAutopausedelay()
    {
        return $this->autopausedelay;
    }

    /**
     * @param int $autopausedelay
     * @return Queue
     */
    public function setAutopausedelay($autopausedelay)
    {
        $this->autopausedelay = $autopausedelay;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAutopausebusy()
    {
        return $this->autopausebusy;
    }

    /**
     * @param TypeYesNo $autopausebusy
     * @return Queue
     */
    public function setAutopausebusy($autopausebusy)
    {
        $this->autopausebusy = $autopausebusy;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getAutopauseunavail()
    {
        return $this->autopauseunavail;
    }

    /**
     * @param TypeYesNo $autopauseunavail
     * @return Queue
     */
    public function setAutopauseunavail($autopauseunavail)
    {
        $this->autopauseunavail = $autopauseunavail;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxlen()
    {
        return $this->maxlen;
    }

    /**
     * @param int $maxlen
     * @return Queue
     */
    public function setMaxlen($maxlen)
    {
        $this->maxlen = $maxlen;
        return $this;
    }

    /**
     * @return int
     */
    public function getServicelevel()
    {
        return $this->servicelevel;
    }

    /**
     * @param int $servicelevel
     * @return Queue
     */
    public function setServicelevel($servicelevel)
    {
        $this->servicelevel = $servicelevel;
        return $this;
    }

    /**
     * @return TypeQueueStrategy
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param TypeQueueStrategy $strategy
     * @return Queue
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
        return $this;
    }

    /**
     * @return string
     */
    public function getJoinempty()
    {
        return $this->joinempty;
    }

    /**
     * @param string $joinempty
     * @return Queue
     */
    public function setJoinempty($joinempty)
    {
        $this->joinempty = $joinempty;
        return $this;
    }

    /**
     * @return string
     */
    public function getLeavewhenempty()
    {
        return $this->leavewhenempty;
    }

    /**
     * @param string $leavewhenempty
     * @return Queue
     */
    public function setLeavewhenempty($leavewhenempty)
    {
        $this->leavewhenempty = $leavewhenempty;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getReportholdtime()
    {
        return $this->reportholdtime;
    }

    /**
     * @param TypeYesNo $reportholdtime
     * @return Queue
     */
    public function setReportholdtime($reportholdtime)
    {
        $this->reportholdtime = $reportholdtime;
        return $this;
    }

    /**
     * @return int
     */
    public function getMemberdelay()
    {
        return $this->memberdelay;
    }

    /**
     * @param int $memberdelay
     * @return Queue
     */
    public function setMemberdelay($memberdelay)
    {
        $this->memberdelay = $memberdelay;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return Queue
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return TypeYesNo
     */
    public function getTimeoutrestart()
    {
        return $this->timeoutrestart;
    }

    /**
     * @param TypeYesNo $timeoutrestart
     * @return Queue
     */
    public function setTimeoutrestart($timeoutrestart)
    {
        $this->timeoutrestart = $timeoutrestart;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultrule()
    {
        return $this->defaultrule;
    }

    /**
     * @param string $defaultrule
     * @return Queue
     */
    public function setDefaultrule($defaultrule)
    {
        $this->defaultrule = $defaultrule;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeoutpriority()
    {
        return $this->timeoutpriority;
    }

    /**
     * @param string $timeoutpriority
     * @return Queue
     */
    public function setTimeoutpriority($timeoutpriority)
    {
        $this->timeoutpriority = $timeoutpriority;
        return $this;
    }

}

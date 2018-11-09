<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voicemail
 *
 * @ORM\Table(name="voicemail", indexes={@ORM\Index(name="voicemail_imapuser", columns={"imapuser"}), @ORM\Index(name="voicemail_mailbox_context", columns={"mailbox", "context"}), @ORM\Index(name="voicemail_mailbox", columns={"mailbox"}), @ORM\Index(name="voicemail_context", columns={"context"})})
 * @ORM\Entity
 */
class Voicemail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="uniqueid", type="integer", nullable=false)
     * @ORM\Id
     */
    private $uniqueid;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=80, nullable=false)
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="mailbox", type="string", length=80, nullable=false)
     */
    private $mailbox;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=80, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=80, nullable=true)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=80, nullable=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pager", type="string", length=80, nullable=true)
     */
    private $pager;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="attach", referencedColumnName="name")
     */
    private $attach;

    /**
     * @var string
     *
     * @ORM\Column(name="attachfmt", type="string", length=10, nullable=true)
     */
    private $attachfmt;

    /**
     * @var string
     *
     * @ORM\Column(name="serveremail", type="string", length=80, nullable=true)
     */
    private $serveremail;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=20, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="tz", type="string", length=30, nullable=true)
     */
    private $tz;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="deletevoicemail", referencedColumnName="name")
     */
    private $deletevoicemail;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="saycid", referencedColumnName="name")
     */
    private $saycid;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="sendvoicemail", referencedColumnName="name")
     */
    private $sendvoicemail;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="review", referencedColumnName="name")
     */
    private $review;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="tempgreetwarn", referencedColumnName="name")
     */
    private $tempgreetwarn;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="operator", referencedColumnName="name")
     */
    private $operator;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="envelope", referencedColumnName="name")
     */
    private $envelope;

    /**
     * @var integer
     *
     * @ORM\Column(name="sayduration", type="integer", nullable=true)
     */
    private $sayduration;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="forcename", referencedColumnName="name")
     */
    private $forcename;

    /**
     * @var TypeYesNo
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeYesNo")
     * @ORM\JoinColumn(name="forcegreetings", referencedColumnName="name")
     */
    private $forcegreetings;

    /**
     * @var string
     *
     * @ORM\Column(name="callback", type="string", length=80, nullable=true)
     */
    private $callback;

    /**
     * @var string
     *
     * @ORM\Column(name="dialout", type="string", length=80, nullable=true)
     */
    private $dialout;

    /**
     * @var string
     *
     * @ORM\Column(name="exitcontext", type="string", length=80, nullable=true)
     */
    private $exitcontext;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxmsg", type="integer", nullable=true)
     */
    private $maxmsg;

    /**
     * @var string
     *
     * @ORM\Column(name="volgain", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $volgain;

    /**
     * @var string
     *
     * @ORM\Column(name="imapuser", type="string", length=80, nullable=true)
     */
    private $imapuser;

    /**
     * @var string
     *
     * @ORM\Column(name="imappassword", type="string", length=80, nullable=true)
     */
    private $imappassword;

    /**
     * @var string
     *
     * @ORM\Column(name="imapserver", type="string", length=80, nullable=true)
     */
    private $imapserver;

    /**
     * @var string
     *
     * @ORM\Column(name="imapport", type="string", length=8, nullable=true)
     */
    private $imapport;

    /**
     * @var string
     *
     * @ORM\Column(name="imapflags", type="string", length=80, nullable=true)
     */
    private $imapflags;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stamp", type="datetime", nullable=true)
     */
    private $stamp;

    /**
     * @return int
     */
    public function getUniqueid()
    {
        return $this->uniqueid;
    }

    /**
     * @param int $uniqueid
     */
    public function setUniqueid($uniqueid)
    {
        $this->uniqueid = $uniqueid;
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
     */
    public function setContext($context)
    {
        $this->context = $context;
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
     */
    public function setMailbox($mailbox)
    {
        $this->mailbox = $mailbox;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * @param string $pager
     */
    public function setPager($pager)
    {
        $this->pager = $pager;
    }

    /**
     * @return TypeYesNo
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * @param TypeYesNo $attach
     */
    public function setAttach($attach)
    {
        $this->attach = $attach;
    }

    /**
     * @return string
     */
    public function getAttachfmt()
    {
        return $this->attachfmt;
    }

    /**
     * @param string $attachfmt
     */
    public function setAttachfmt($attachfmt)
    {
        $this->attachfmt = $attachfmt;
    }

    /**
     * @return string
     */
    public function getServeremail()
    {
        return $this->serveremail;
    }

    /**
     * @param string $serveremail
     */
    public function setServeremail($serveremail)
    {
        $this->serveremail = $serveremail;
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
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * @param string $tz
     */
    public function setTz($tz)
    {
        $this->tz = $tz;
    }

    /**
     * @return TypeYesNo
     */
    public function getDeletevoicemail()
    {
        return $this->deletevoicemail;
    }

    /**
     * @param TypeYesNo $deletevoicemail
     */
    public function setDeletevoicemail($deletevoicemail)
    {
        $this->deletevoicemail = $deletevoicemail;
    }

    /**
     * @return TypeYesNo
     */
    public function getSaycid()
    {
        return $this->saycid;
    }

    /**
     * @param TypeYesNo $saycid
     */
    public function setSaycid($saycid)
    {
        $this->saycid = $saycid;
    }

    /**
     * @return TypeYesNo
     */
    public function getSendvoicemail()
    {
        return $this->sendvoicemail;
    }

    /**
     * @param TypeYesNo $sendvoicemail
     */
    public function setSendvoicemail($sendvoicemail)
    {
        $this->sendvoicemail = $sendvoicemail;
    }

    /**
     * @return TypeYesNo
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param TypeYesNo $review
     */
    public function setReview($review)
    {
        $this->review = $review;
    }

    /**
     * @return TypeYesNo
     */
    public function getTempgreetwarn()
    {
        return $this->tempgreetwarn;
    }

    /**
     * @param TypeYesNo $tempgreetwarn
     */
    public function setTempgreetwarn($tempgreetwarn)
    {
        $this->tempgreetwarn = $tempgreetwarn;
    }

    /**
     * @return TypeYesNo
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param TypeYesNo $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return TypeYesNo
     */
    public function getEnvelope()
    {
        return $this->envelope;
    }

    /**
     * @param TypeYesNo $envelope
     */
    public function setEnvelope($envelope)
    {
        $this->envelope = $envelope;
    }

    /**
     * @return int
     */
    public function getSayduration()
    {
        return $this->sayduration;
    }

    /**
     * @param int $sayduration
     */
    public function setSayduration($sayduration)
    {
        $this->sayduration = $sayduration;
    }

    /**
     * @return TypeYesNo
     */
    public function getForcename()
    {
        return $this->forcename;
    }

    /**
     * @param TypeYesNo $forcename
     */
    public function setForcename($forcename)
    {
        $this->forcename = $forcename;
    }

    /**
     * @return TypeYesNo
     */
    public function getForcegreetings()
    {
        return $this->forcegreetings;
    }

    /**
     * @param TypeYesNo $forcegreetings
     */
    public function setForcegreetings($forcegreetings)
    {
        $this->forcegreetings = $forcegreetings;
    }

    /**
     * @return string
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param string $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return string
     */
    public function getDialout()
    {
        return $this->dialout;
    }

    /**
     * @param string $dialout
     */
    public function setDialout($dialout)
    {
        $this->dialout = $dialout;
    }

    /**
     * @return string
     */
    public function getExitcontext()
    {
        return $this->exitcontext;
    }

    /**
     * @param string $exitcontext
     */
    public function setExitcontext($exitcontext)
    {
        $this->exitcontext = $exitcontext;
    }

    /**
     * @return int
     */
    public function getMaxmsg()
    {
        return $this->maxmsg;
    }

    /**
     * @param int $maxmsg
     */
    public function setMaxmsg($maxmsg)
    {
        $this->maxmsg = $maxmsg;
    }

    /**
     * @return string
     */
    public function getVolgain()
    {
        return $this->volgain;
    }

    /**
     * @param string $volgain
     */
    public function setVolgain($volgain)
    {
        $this->volgain = $volgain;
    }

    /**
     * @return string
     */
    public function getImapuser()
    {
        return $this->imapuser;
    }

    /**
     * @param string $imapuser
     */
    public function setImapuser($imapuser)
    {
        $this->imapuser = $imapuser;
    }

    /**
     * @return string
     */
    public function getImappassword()
    {
        return $this->imappassword;
    }

    /**
     * @param string $imappassword
     */
    public function setImappassword($imappassword)
    {
        $this->imappassword = $imappassword;
    }

    /**
     * @return string
     */
    public function getImapserver()
    {
        return $this->imapserver;
    }

    /**
     * @param string $imapserver
     */
    public function setImapserver($imapserver)
    {
        $this->imapserver = $imapserver;
    }

    /**
     * @return string
     */
    public function getImapport()
    {
        return $this->imapport;
    }

    /**
     * @param string $imapport
     */
    public function setImapport($imapport)
    {
        $this->imapport = $imapport;
    }

    /**
     * @return string
     */
    public function getImapflags()
    {
        return $this->imapflags;
    }

    /**
     * @param string $imapflags
     */
    public function setImapflags($imapflags)
    {
        $this->imapflags = $imapflags;
    }

    /**
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * @param \DateTime $stamp
     */
    public function setStamp($stamp)
    {
        $this->stamp = $stamp;
    }

}

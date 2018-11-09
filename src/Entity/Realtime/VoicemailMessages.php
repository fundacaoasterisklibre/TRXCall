<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoicemailMessages
 *
 * @ORM\Table(name="voicemail_messages", indexes={@ORM\Index(name="voicemail_messages_dir", columns={"dir"})})
 * @ORM\Entity
 */
class VoicemailMessages
{
    /**
     * @var string
     *
     * @ORM\Column(name="dir", type="string", length=255, nullable=false)
     * @ORM\Id
     */
    private $dir;

    /**
     * @var integer
     *
     * @ORM\Column(name="msgnum", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $msgnum;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=80, nullable=true)
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="macrocontext", type="string", length=80, nullable=true)
     */
    private $macrocontext;

    /**
     * @var string
     *
     * @ORM\Column(name="callerid", type="string", length=80, nullable=true)
     */
    private $callerid;

    /**
     * @var integer
     *
     * @ORM\Column(name="origtime", type="integer", nullable=true)
     */
    private $origtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="recording", type="blob", nullable=true)
     */
    private $recording;

    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=30, nullable=true)
     */
    private $flag;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=30, nullable=true)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="mailboxuser", type="string", length=30, nullable=true)
     */
    private $mailboxuser;

    /**
     * @var string
     *
     * @ORM\Column(name="mailboxcontext", type="string", length=30, nullable=true)
     */
    private $mailboxcontext;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_id", type="string", length=40, nullable=true)
     */
    private $msgId;



    /**
     * Set dir
     *
     * @param string $dir
     *
     * @return VoicemailMessages
     */
    public function setDir($dir)
    {
        $this->dir = $dir;

        return $this;
    }

    /**
     * Get dir
     *
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Set msgnum
     *
     * @param integer $msgnum
     *
     * @return VoicemailMessages
     */
    public function setMsgnum($msgnum)
    {
        $this->msgnum = $msgnum;

        return $this;
    }

    /**
     * Get msgnum
     *
     * @return integer
     */
    public function getMsgnum()
    {
        return $this->msgnum;
    }

    /**
     * Set context
     *
     * @param string $context
     *
     * @return VoicemailMessages
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set macrocontext
     *
     * @param string $macrocontext
     *
     * @return VoicemailMessages
     */
    public function setMacrocontext($macrocontext)
    {
        $this->macrocontext = $macrocontext;

        return $this;
    }

    /**
     * Get macrocontext
     *
     * @return string
     */
    public function getMacrocontext()
    {
        return $this->macrocontext;
    }

    /**
     * Set callerid
     *
     * @param string $callerid
     *
     * @return VoicemailMessages
     */
    public function setCallerid($callerid)
    {
        $this->callerid = $callerid;

        return $this;
    }

    /**
     * Get callerid
     *
     * @return string
     */
    public function getCallerid()
    {
        return $this->callerid;
    }

    /**
     * Set origtime
     *
     * @param integer $origtime
     *
     * @return VoicemailMessages
     */
    public function setOrigtime($origtime)
    {
        $this->origtime = $origtime;

        return $this;
    }

    /**
     * Get origtime
     *
     * @return integer
     */
    public function getOrigtime()
    {
        return $this->origtime;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return VoicemailMessages
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set recording
     *
     * @param string $recording
     *
     * @return VoicemailMessages
     */
    public function setRecording($recording)
    {
        $this->recording = $recording;

        return $this;
    }

    /**
     * Get recording
     *
     * @return string
     */
    public function getRecording()
    {
        return $this->recording;
    }

    /**
     * Set flag
     *
     * @param string $flag
     *
     * @return VoicemailMessages
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return VoicemailMessages
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set mailboxuser
     *
     * @param string $mailboxuser
     *
     * @return VoicemailMessages
     */
    public function setMailboxuser($mailboxuser)
    {
        $this->mailboxuser = $mailboxuser;

        return $this;
    }

    /**
     * Get mailboxuser
     *
     * @return string
     */
    public function getMailboxuser()
    {
        return $this->mailboxuser;
    }

    /**
     * Set mailboxcontext
     *
     * @param string $mailboxcontext
     *
     * @return VoicemailMessages
     */
    public function setMailboxcontext($mailboxcontext)
    {
        $this->mailboxcontext = $mailboxcontext;

        return $this;
    }

    /**
     * Get mailboxcontext
     *
     * @return string
     */
    public function getMailboxcontext()
    {
        return $this->mailboxcontext;
    }

    /**
     * Set msgId
     *
     * @param string $msgId
     *
     * @return VoicemailMessages
     */
    public function setMsgId($msgId)
    {
        $this->msgId = $msgId;

        return $this;
    }

    /**
     * Get msgId
     *
     * @return string
     */
    public function getMsgId()
    {
        return $this->msgId;
    }
}

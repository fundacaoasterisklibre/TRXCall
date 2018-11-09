<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meetme
 *
 * @ORM\Table(name="meetme", indexes={@ORM\Index(name="meetme_confno_start_end", columns={"confno", "starttime", "endtime"})})
 * @ORM\Entity
 */
class Meetme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bookid", type="integer", nullable=false)
     * @ORM\Id
     */
    private $bookid;

    /**
     * @var string
     *
     * @ORM\Column(name="confno", type="string", length=80, nullable=false)
     */
    private $confno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="starttime", type="datetime", nullable=true)
     */
    private $starttime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endtime", type="datetime", nullable=true)
     */
    private $endtime;

    /**
     * @var string
     *
     * @ORM\Column(name="pin", type="string", length=20, nullable=true)
     */
    private $pin;

    /**
     * @var string
     *
     * @ORM\Column(name="adminpin", type="string", length=20, nullable=true)
     */
    private $adminpin;

    /**
     * @var string
     *
     * @ORM\Column(name="opts", type="string", length=20, nullable=true)
     */
    private $opts;

    /**
     * @var string
     *
     * @ORM\Column(name="adminopts", type="string", length=20, nullable=true)
     */
    private $adminopts;

    /**
     * @var string
     *
     * @ORM\Column(name="recordingfilename", type="string", length=80, nullable=true)
     */
    private $recordingfilename;

    /**
     * @var string
     *
     * @ORM\Column(name="recordingformat", type="string", length=10, nullable=true)
     */
    private $recordingformat;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxusers", type="integer", nullable=true)
     */
    private $maxusers;

    /**
     * @var integer
     *
     * @ORM\Column(name="members", type="integer", nullable=false)
     */
    private $members;



    /**
     * Set bookid
     *
     * @param integer $bookid
     *
     * @return Meetme
     */
    public function setBookid($bookid)
    {
        $this->bookid = $bookid;

        return $this;
    }

    /**
     * Get bookid
     *
     * @return integer
     */
    public function getBookid()
    {
        return $this->bookid;
    }

    /**
     * Set confno
     *
     * @param string $confno
     *
     * @return Meetme
     */
    public function setConfno($confno)
    {
        $this->confno = $confno;

        return $this;
    }

    /**
     * Get confno
     *
     * @return string
     */
    public function getConfno()
    {
        return $this->confno;
    }

    /**
     * Set starttime
     *
     * @param \DateTime $starttime
     *
     * @return Meetme
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;

        return $this;
    }

    /**
     * Get starttime
     *
     * @return \DateTime
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set endtime
     *
     * @param \DateTime $endtime
     *
     * @return Meetme
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;

        return $this;
    }

    /**
     * Get endtime
     *
     * @return \DateTime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Set pin
     *
     * @param string $pin
     *
     * @return Meetme
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set adminpin
     *
     * @param string $adminpin
     *
     * @return Meetme
     */
    public function setAdminpin($adminpin)
    {
        $this->adminpin = $adminpin;

        return $this;
    }

    /**
     * Get adminpin
     *
     * @return string
     */
    public function getAdminpin()
    {
        return $this->adminpin;
    }

    /**
     * Set opts
     *
     * @param string $opts
     *
     * @return Meetme
     */
    public function setOpts($opts)
    {
        $this->opts = $opts;

        return $this;
    }

    /**
     * Get opts
     *
     * @return string
     */
    public function getOpts()
    {
        return $this->opts;
    }

    /**
     * Set adminopts
     *
     * @param string $adminopts
     *
     * @return Meetme
     */
    public function setAdminopts($adminopts)
    {
        $this->adminopts = $adminopts;

        return $this;
    }

    /**
     * Get adminopts
     *
     * @return string
     */
    public function getAdminopts()
    {
        return $this->adminopts;
    }

    /**
     * Set recordingfilename
     *
     * @param string $recordingfilename
     *
     * @return Meetme
     */
    public function setRecordingfilename($recordingfilename)
    {
        $this->recordingfilename = $recordingfilename;

        return $this;
    }

    /**
     * Get recordingfilename
     *
     * @return string
     */
    public function getRecordingfilename()
    {
        return $this->recordingfilename;
    }

    /**
     * Set recordingformat
     *
     * @param string $recordingformat
     *
     * @return Meetme
     */
    public function setRecordingformat($recordingformat)
    {
        $this->recordingformat = $recordingformat;

        return $this;
    }

    /**
     * Get recordingformat
     *
     * @return string
     */
    public function getRecordingformat()
    {
        return $this->recordingformat;
    }

    /**
     * Set maxusers
     *
     * @param integer $maxusers
     *
     * @return Meetme
     */
    public function setMaxusers($maxusers)
    {
        $this->maxusers = $maxusers;

        return $this;
    }

    /**
     * Get maxusers
     *
     * @return integer
     */
    public function getMaxusers()
    {
        return $this->maxusers;
    }

    /**
     * Set members
     *
     * @param integer $members
     *
     * @return Meetme
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * Get members
     *
     * @return integer
     */
    public function getMembers()
    {
        return $this->members;
    }
}

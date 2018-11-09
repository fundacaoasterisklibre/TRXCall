<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musiconhold
 *
 * @ORM\Table(name="musiconhold")
 * @ORM\Entity
 */
class Musiconhold
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=80, nullable=false)
     * @ORM\Id
     */
    private $name;

    /**
     * @var moh_mode_values
     *
     * @ORM\Column(name="mode", type="moh_mode_values", nullable=true)
     */

    /**
     * @var TypeMohMode
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Type\TypeMohMode")
     * @ORM\JoinColumn(name="mode", referencedColumnName="name")
     */
    private $mode;

    /**
     * @var string
     *
     * @ORM\Column(name="directory", type="string", length=255, nullable=true)
     */
    private $directory;

    /**
     * @var string
     *
     * @ORM\Column(name="application", type="string", length=255, nullable=true)
     */
    private $application;

    /**
     * @var string
     *
     * @ORM\Column(name="digit", type="string", length=1, nullable=true)
     */
    private $digit;

    /**
     * @var string
     *
     * @ORM\Column(name="sort", type="string", length=10, nullable=true)
     */
    private $sort;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=10, nullable=true)
     */
    private $format;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stamp", type="datetime", nullable=true)
     */
    private $stamp;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Musiconhold
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mode
     *
     * @param moh_mode_values $mode
     *
     * @return Musiconhold
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return moh_mode_values
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set directory
     *
     * @param string $directory
     *
     * @return Musiconhold
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set application
     *
     * @param string $application
     *
     * @return Musiconhold
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set digit
     *
     * @param string $digit
     *
     * @return Musiconhold
     */
    public function setDigit($digit)
    {
        $this->digit = $digit;

        return $this;
    }

    /**
     * Get digit
     *
     * @return string
     */
    public function getDigit()
    {
        return $this->digit;
    }

    /**
     * Set sort
     *
     * @param string $sort
     *
     * @return Musiconhold
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Musiconhold
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set stamp
     *
     * @param \DateTime $stamp
     *
     * @return Musiconhold
     */
    public function setStamp($stamp)
    {
        $this->stamp = $stamp;

        return $this;
    }

    /**
     * Get stamp
     *
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }
}

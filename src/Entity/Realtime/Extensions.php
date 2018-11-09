<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Extensions
 *
 * @ORM\Table(name="extensions", uniqueConstraints={@ORM\UniqueConstraint(name="extensions_context_exten_priority_key", columns={"context", "exten", "priority"})})
 * @ORM\Entity
 */
class Extensions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=40, nullable=false)
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="exten", type="string", length=40, nullable=false)
     */
    private $exten;

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="app", type="string", length=40, nullable=false)
     */
    private $app;

    /**
     * @var string
     *
     * @ORM\Column(name="appdata", type="string", length=256, nullable=false)
     */
    private $appdata;



    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Extensions
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set context
     *
     * @param string $context
     *
     * @return Extensions
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
     * Set exten
     *
     * @param string $exten
     *
     * @return Extensions
     */
    public function setExten($exten)
    {
        $this->exten = $exten;

        return $this;
    }

    /**
     * Get exten
     *
     * @return string
     */
    public function getExten()
    {
        return $this->exten;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Extensions
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set app
     *
     * @param string $app
     *
     * @return Extensions
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return string
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set appdata
     *
     * @param string $appdata
     *
     * @return Extensions
     */
    public function setAppdata($appdata)
    {
        $this->appdata = $appdata;

        return $this;
    }

    /**
     * Get appdata
     *
     * @return string
     */
    public function getAppdata()
    {
        return $this->appdata;
    }
}

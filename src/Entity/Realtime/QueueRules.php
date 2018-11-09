<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * QueueRules
 *
 * @ORM\Table(name="queue_rules")
 * @ORM\Entity
 */
class QueueRules
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
     * @ORM\Column(name="rule_name", type="string", length=80, nullable=false)
     */
    private $ruleName;

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="string", length=32, nullable=false)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="min_penalty", type="string", length=32, nullable=false)
     */
    private $minPenalty;

    /**
     * @var string
     *
     * @ORM\Column(name="max_penalty", type="string", length=32, nullable=false)
     */
    private $maxPenalty;



    /**
     * Set id
     *
     * @param integer $id
     *
     * @return QueueRules
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
     * Set ruleName
     *
     * @param string $ruleName
     *
     * @return QueueRules
     */
    public function setRuleName($ruleName)
    {
        $this->ruleName = $ruleName;

        return $this;
    }

    /**
     * Get ruleName
     *
     * @return string
     */
    public function getRuleName()
    {
        return $this->ruleName;
    }

    /**
     * Set time
     *
     * @param string $time
     *
     * @return QueueRules
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set minPenalty
     *
     * @param string $minPenalty
     *
     * @return QueueRules
     */
    public function setMinPenalty($minPenalty)
    {
        $this->minPenalty = $minPenalty;

        return $this;
    }

    /**
     * Get minPenalty
     *
     * @return string
     */
    public function getMinPenalty()
    {
        return $this->minPenalty;
    }

    /**
     * Set maxPenalty
     *
     * @param string $maxPenalty
     *
     * @return QueueRules
     */
    public function setMaxPenalty($maxPenalty)
    {
        $this->maxPenalty = $maxPenalty;

        return $this;
    }

    /**
     * Get maxPenalty
     *
     * @return string
     */
    public function getMaxPenalty()
    {
        return $this->maxPenalty;
    }
}

<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Branch;

/**
 * QueueMembers
 *
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"QueueMember" = "QueueMember", "QueueMemberAgent" = "QueueMemberAgent"})
 * @ORM\Table(name="queue_member")
 */
class QueueMember
{

    /**
     * @var integer
     *
     * @ORM\Column(name="uniqueid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="queue_members_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Realtime\Queue", inversedBy="members")
     * @ORM\JoinColumn(name="queue_name", referencedColumnName="name")
     */
    private $queue;

    /**
     * @var Branch
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Branch")
     * @ORM\JoinColumn(name="branch", referencedColumnName="id")
     */
    private $branch;

    /**
     * @ORM\Column(name="membername", type="string", nullable=true)
     */
    private $memberName;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $interface;

    /**
     * @var int
     *
     * @ORM\Column(name="penalty", type="integer")
     */
    private $penalty;

    /**
     * @var integer
     *
     * @ORM\Column(name="paused", type="boolean")
     */
    private $paused;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return QueueMember
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param mixed $queue
     * @return QueueMember
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;
        return $this;
    }

    /**
     * @return Branch
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param Branch $branch
     * @return QueueMember
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
        return $this;
    }

    /**
     * @return int
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * @param int $penalty
     * @return QueueMember
     */
    public function setPenalty($penalty)
    {
        $this->penalty = $penalty;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaused()
    {
        return $this->paused;
    }

    /**
     * @param int $paused
     * @return QueueMember
     */
    public function setPaused($paused)
    {
        $this->paused = $paused;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMemberName()
    {
        return $this->memberName;
    }

    /**
     * @param mixed $memberName
     * @return QueueMember
     */
    public function setMemberName($memberName)
    {
        $this->memberName = $memberName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * @param mixed $interface
     * @return QueueMember
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;
        return $this;
    }


}

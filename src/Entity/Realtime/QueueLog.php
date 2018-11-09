<?php

namespace App\Entity\Realtime;

use Doctrine\ORM\Mapping as ORM;

/**
 * QueueRules
 *
 * @ORM\Table(name="queue_log")
 * @ORM\Entity
 */
class QueueLog
{
    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(name="time", type="string", length=26, nullable=false)
     */
    private $time;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $callid;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $queuename;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $agent;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $event;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $data;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $data1;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $data2;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $data3;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $data4;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $data5;

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return QueueLog
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param string $callid
     * @return QueueLog
     */
    public function setCallid($callid)
    {
        $this->callid = $callid;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueuename()
    {
        return $this->queuename;
    }

    /**
     * @param string $queuename
     * @return QueueLog
     */
    public function setQueuename($queuename)
    {
        $this->queuename = $queuename;
        return $this;
    }

    /**
     * @return string
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @param string $agent
     * @return QueueLog
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
        return $this;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $event
     * @return QueueLog
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return QueueLog
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getData1()
    {
        return $this->data1;
    }

    /**
     * @param string $data1
     * @return QueueLog
     */
    public function setData1($data1)
    {
        $this->data1 = $data1;
        return $this;
    }

    /**
     * @return string
     */
    public function getData2()
    {
        return $this->data2;
    }

    /**
     * @param string $data2
     * @return QueueLog
     */
    public function setData2($data2)
    {
        $this->data2 = $data2;
        return $this;
    }

    /**
     * @return string
     */
    public function getData3()
    {
        return $this->data3;
    }

    /**
     * @param string $data3
     * @return QueueLog
     */
    public function setData3($data3)
    {
        $this->data3 = $data3;
        return $this;
    }

    /**
     * @return string
     */
    public function getData4()
    {
        return $this->data4;
    }

    /**
     * @param string $data4
     * @return QueueLog
     */
    public function setData4($data4)
    {
        $this->data4 = $data4;
        return $this;
    }

    /**
     * @return string
     */
    public function getData5()
    {
        return $this->data5;
    }

    /**
     * @param string $data5
     * @return QueueLog
     */
    public function setData5($data5)
    {
        $this->data5 = $data5;
        return $this;
    }


}

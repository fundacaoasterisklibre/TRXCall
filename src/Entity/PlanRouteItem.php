<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 05/08/17
 * Time: 00:28
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Device
 * @package  App\Entity
 *
 * @ORM\Table("plan_route_item")
 * @ORM\Entity(repositoryClass="App\Repository\DeviceRepository")
 */
class PlanRouteItem
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="plan_route_item_seq", initialValue=1, allocationSize=100)
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="""order""", type="integer")
     */
    private $order = 0;

    /**
     * @var PlanRoute
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\PlanRoute", inversedBy="items")
     */
    private $planRoute;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $groupType;

    /**
     * @var GroupNumber
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupNumber")
     */
    private $groupNumber;

    /**
     * @var Trunk
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Trunk")
     */
    private $trunk;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $count;

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
     * Set order
     *
     * @param integer $order
     *
     * @return PlanRouteItem
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set planRoute
     *
     * @param \App\Entity\PlanRoute $planRoute
     *
     * @return PlanRouteItem
     */
    public function setPlanRoute(\App\Entity\PlanRoute $planRoute = null)
    {
        $this->planRoute = $planRoute;

        return $this;
    }

    /**
     * Get planRoute
     *
     * @return \App\Entity\PlanRoute
     */
    public function getPlanRoute()
    {
        return $this->planRoute;
    }

    /**
     * @return mixed
     */
    public function getGroupType()
    {
        return $this->groupType;
    }

    /**
     * @param mixed $groupType
     * @return PlanRouteItem
     */
    public function setGroupType($groupType)
    {
        $this->groupType = $groupType;
        return $this;
    }

    /**
     * Set groupNumber
     *
     * @param \App\Entity\GroupNumber $groupNumber
     *
     * @return PlanRouteItem
     */
    public function setGroupNumber(\App\Entity\GroupNumber $groupNumber = null)
    {
        $this->groupNumber = $groupNumber;

        return $this;
    }

    /**
     * Get groupNumber
     *
     * @return \App\Entity\GroupNumber
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * Set trunk
     *
     * @param \App\Entity\Trunk $trunk
     *
     * @return PlanRouteItem
     */
    public function setTrunk(\App\Entity\Trunk $trunk = null)
    {
        $this->trunk = $trunk;

        return $this;
    }

    /**
     * Get trunk
     *
     * @return \App\Entity\Trunk
     */
    public function getTrunk()
    {
        return $this->trunk;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    public function addCount() {
        if ($this->count === null) {
            $this->count = 0;
        }

        $this->count++;
    }
}

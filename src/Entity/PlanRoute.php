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
 * @ORM\Table("plan_route")
 * @ORM\Entity(repositoryClass="App\Repository\PlanRouteRepository")
 */
class PlanRoute
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="plan_route_seq", initialValue=1, allocationSize=100)
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     *
     * @ORM\OneToMany(targetEntity="App\Entity\PlanRouteItem", mappedBy="planRoute", cascade={"persist", "merge", "remove"})
     * @ORM\OrderBy({"order" = "ASC"})
     */
    protected $items;


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
     * Set name
     *
     * @param string $name
     *
     * @return PlanRoute
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
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     * @return PlanRoute
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }


}

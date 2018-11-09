<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 14/06/17
 * Time: 22:41
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class IvrOption
 *
 * @package  App\Entity
 *
 * @ORM\Table("ivr_option")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */
class IvrOption
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="App\Entity\Ivr", inversedBy="options")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ivr;

    /**
     *
     * @ORM\Id
     * @ORM\Column(type="string", nullable=true)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $option;

    /**
     *
     * @var Forward
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Forward", cascade={"persist", "merge"})
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn(name="classname", referencedColumnName="classname"),
     *     @ORM\JoinColumn(name="reference", referencedColumnName="reference")
     * )
     */
    private $goto;

    /**
     * @return mixed
     */
    public function getIvr()
    {
        return $this->ivr;
    }

    /**
     * @param mixed $ivr
     * @return IvrOption
     */
    public function setIvr($ivr)
    {
        $this->ivr = $ivr;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param mixed $option
     * @return IvrOption
     */
    public function setOption($option)
    {
        $this->option = $option;
        return $this;
    }

    /**
     * @return Forward
     */
    public function getGoto()
    {
        return $this->goto;
    }

    /**
     * @param Forward $goto
     * @return IvrOption
     */
    public function setGoto($goto)
    {
        $this->goto = $goto;
        return $this;
    }


}

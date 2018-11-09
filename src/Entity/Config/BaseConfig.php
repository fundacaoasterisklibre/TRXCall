<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 27/02/2018
 * Time: 07:41
 */

namespace App\Entity\Config;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BaseConfig
 *
 * @ORM\MappedSuperclass()
 *
 * @package App\Entity\Config
 */
class BaseConfig
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $value;

    /**
     * @ORM\Column(type="string")
     */
    private $context;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AsteriskConf
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return AsteriskConf
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     * @return BaseConfig
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }


}
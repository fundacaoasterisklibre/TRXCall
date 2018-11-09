<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 13/09/17
 * Time: 23:15
 */

namespace App\DTO;

class ForwardDTO
{
    private $classname;

    private $reference;

    private $description;

    private $icon;

    private $context;

    /**
     * @return mixed
     */
    public function getClassname()
    {
        return $this->classname;
    }

    /**
     * @param mixed $classname
     * @return ForwardDTO
     */
    public function setClassname($classname)
    {
        $this->classname = $classname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return ForwardDTO
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return ForwardDTO
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     * @return ForwardDTO
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
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
     * @return ForwardDTO
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }


}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Cdr
 * @package  App\Entity
 *
 * @ORM\Table("cdr")
 * @ORM\Entity(repositoryClass="App\Repository\CdrRepository")
 */
class Cdr
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="cdr_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
     private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Cdr
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Cdr
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

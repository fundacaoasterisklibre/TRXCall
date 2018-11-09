<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 12/02/2018
 * Time: 17:37
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"App:Realtime\Sippeers": "App\Entity\Realtime\Sippeers", "App\KhompProtocol": "App\Entity\KhompProtocol"})
 */
abstract class AbstractProtocol
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="string", length=40, nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AbstractProtocol
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getValue() {
        return $this->getId();
    }


}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 01/11/2017
 * Time: 21:42
 */

namespace App\Entity\Type;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="type_sip_nat")
 * @ORM\Entity
 *
 * INSERT INTO type_sip_nat (name) VALUES ('yes');
 * INSERT INTO type_sip_nat (name) VALUES ('no');
 * INSERT INTO type_sip_nat (name) VALUES ('never');
 * INSERT INTO type_sip_nat (name) VALUES ('route');
 *
 */
class TypeSipNat
{

    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TypeYesNo
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}
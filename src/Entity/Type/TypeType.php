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
 * @ORM\Table(name="type_type")
 * @ORM\Entity
 *
 * INSERT INTO type_type (name) VALUES ('friend');
 * INSERT INTO type_type (name) VALUES ('user');
 * INSERT INTO type_type (name) VALUES ('peer');
 *
 */
class TypeType
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
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
 * @ORM\Table(name="type_yes_no")
 * @ORM\Entity
 *
 * INSERT INTO type_yes_no (name) VALUES ('yes');
 * INSERT INTO type_yes_no (name) VALUES ('no');
 *
 */
class TypeYesNo
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
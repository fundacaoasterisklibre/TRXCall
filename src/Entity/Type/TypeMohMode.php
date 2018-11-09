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
 * @ORM\Table(name="type_sip_moh_mode")
 * @ORM\Entity
 *
 * INSERT INTO type_sip_moh_mode (name) VALUES ('custom');
 * INSERT INTO type_sip_moh_mode (name) VALUES ('files');
 * INSERT INTO type_sip_moh_mode (name) VALUES ('mp3nb');
 * INSERT INTO type_sip_moh_mode (name) VALUES ('quietmp3nb');
 * INSERT INTO type_sip_moh_mode (name) VALUES ('quietmp3');
 *
 */
class TypeMohMode
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
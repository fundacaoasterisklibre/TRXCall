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
 * @ORM\Table(name="type_sip_calling_pres")
 * @ORM\Entity
 *
 * INSERT INTO type_sip_calling_pres (name) VALUES ('allowed_not_screened');
 * INSERT INTO type_sip_calling_pres (name) VALUES ('allowed_passed_screen');
 * INSERT INTO type_sip_calling_pres (name) VALUES ('allowed_failed_screen');
 * INSERT INTO type_sip_calling_pres (name) VALUES ('allowed');
 * INSERT INTO type_sip_calling_pres (name) VALUES ('prohib_not_screened');
 * INSERT INTO type_sip_calling_pres (name) VALUES ('prohib_passed_screen');
 * INSERT INTO type_sip_calling_pres (name) VALUES ('prohib_failed_screen');
 * INSERT INTO type_sip_calling_pres (name) VALUES ('prohib');
 *
 */
class TypeSipCallingpres
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
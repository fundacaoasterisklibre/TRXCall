<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 01/11/2017
 * Time: 21:42
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="trunk_register_type")
 * @ORM\Entity
 *
 * INSERT INTO trunk_register_type (name, description, protocol) VALUES ('GATEWAY_SIP', 'Prover autenticação SIP', 'SIP');
 * INSERT INTO trunk_register_type (name, description, protocol) VALUES ('AUTH_SIP', 'Autenticar em gateway SIP', 'SIP');
 *
 */
class TrunkRegisterType
{
    const PROTOCOL_SIP = 'SIP';
    const PROTOCOL_IAX = 'IAX';
    const PROTOCOL_KHOMP = 'KHOMP';

    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $protocol;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $mask;

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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return TrunkRegisterType
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param mixed $protocol
     * @return TrunkRegisterType
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * @param mixed $mask
     * @return TrunkRegisterType
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
        return $this;
    }



}
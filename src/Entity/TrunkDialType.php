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
 * @ORM\Table(name="trunk_dial_type")
 * @ORM\Entity
 *
 * INSERT INTO trunk_dial_type (value, label) VALUES ('SIMPLE', 'Da maneira como foi discado');
 * INSERT INTO trunk_dial_type (value, label) VALUES ('DDD', '[DDD][Número]');
 * INSERT INTO trunk_dial_type (value, label) VALUES ('E164', '[PAIS][DDD][Número]');
 *
 */
class TrunkDialType
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $value;

    /**
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return TrunkDialType
     */
    public function setValue(string $value): TrunkDialType
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return TrunkDialType
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

}
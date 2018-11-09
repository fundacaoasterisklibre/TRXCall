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
 * @ORM\Table(name="type_queue_strategy")
 * @ORM\Entity
 *
 * INSERT INTO type_queue_strategy (value, label) VALUES ('ringall', 'Tocar em todos');
 * INSERT INTO type_queue_strategy (value, label) VALUES ('roundrobin', 'RRMemory');
 * INSERT INTO type_queue_strategy (value, label) VALUES ('leastrecent', 'Tocar o mais recente');
 * INSERT INTO type_queue_strategy (value, label) VALUES ('fewestcalls', 'Tocar o com menor número de chamadas');
 * INSERT INTO type_queue_strategy (value, label) VALUES ('random', 'Aleatório);
 * INSERT INTO type_queue_strategy (value, label) VALUES ('rrmemory', 'Tocar o próximo agente que não atendeu');
 * INSERT INTO type_queue_strategy (value, label) VALUES ('linear', 'Tocar como configurado');
 * INSERT INTO type_queue_strategy (value, label) VALUES ('wrandom', 'Aleatório usando a penalidade');
 *
 */
class TypeQueueStrategy
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $value;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $label;

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return TypeQueueStrategy
     */
    public function setValue($value)
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
     * @return TypeQueueStrategy
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }


}
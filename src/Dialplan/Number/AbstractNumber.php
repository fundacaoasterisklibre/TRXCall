<?php

namespace App\Dialplan\Number;

use App\Dialplan\Type\AbstractGroupType;

abstract class AbstractNumber
{
    private $DDD;
    private $number;
    private $originalNumber;
    private $agi;

    /**
     * @var AbstractGroupType
     */
    private $group;

    /**
     * AbstractNumberModel constructor.
     * @param $originalNumber
     */
    protected function __construct($ddd, $originalNumber, $agi = null)
    {
        $this->agi = $agi;
        $this->DDD = $ddd;
        $this->originalNumber = $originalNumber;
        $this->number = $this->formatE164();
        $this->group = $this->setGroup();

    }

    public static function newInstance($ddi, $ddd, $originalNumber, $agi = null)
    {
        switch ($ddi) {
            case '55':
                return new BRNumber($ddd, $originalNumber, $agi);
                break;
        }

        throw new \Exception('Dialplan não implementado');
    }

    abstract protected function getDDI();

    abstract protected function formatE164();

    abstract protected function setGroup();

    abstract public function getDialNumber($format, $operator = null, $prefix = null, $sufix = null);

    /**
     * @return mixed
     */
    protected function getDDD()
    {
        return $this->DDD;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getOriginalNumber()
    {
        return $this->originalNumber;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    public function debug($message)
    {
        if ($this->agi !== null) {
            $this->agi->verbose($message);
        }
    }


}
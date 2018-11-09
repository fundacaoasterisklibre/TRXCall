<?php

namespace App\Dialplan\Format;

abstract class AbstractFormat
{
    const SIMPLE = ['value' => 'SIMPLE', 'label' => 'Da maneira como foi discada'];
    const E164 = ['value' => 'E164', 'label' => 'E164 - [DDI][DDD][NÚMERO]'];

    /**
     * @param $ddi
     * @return AbstractFormat
     * @throws \Exception
     */
    public static function getFormat($ddi)
    {
        switch ($ddi) {
            case '55':
                return new BRFormat();
                break;
        }

        throw new \Exception('Formato não implementado');
    }


    abstract public function getResource();
}
<?php

namespace App\Dialplan\Type;

abstract class AbstractGroupType
{
    const INTERNATIONAL = ['value' => 'INTERNATIONAL', 'label' => 'Internacional'];
    const CUSTOM = ['value' => 'CUSTOM', 'label' => 'Customizada'];

    public static function getGroup($ddi)
    {
        switch ($ddi) {
            case '55':
                return new BRGroupType();
                break;
        }

        throw new \Exception('Formato não implementado');
    }

    abstract public function getResource();
}
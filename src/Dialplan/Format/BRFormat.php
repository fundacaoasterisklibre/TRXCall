<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 22/02/2018
 * Time: 23:59
 */

namespace App\Dialplan\Format;


class BRFormat extends AbstractFormat
{
    const DDD = ['value' => 'DDD', 'label' => 'DDD - [DDD][NÚMERO]'];


    public function getResource()
    {
        return [
            self::SIMPLE,
            self::DDD,
            self::E164
        ];
    }
}
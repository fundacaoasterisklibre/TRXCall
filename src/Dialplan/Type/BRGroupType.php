<?php
namespace App\Dialplan\Type;

class BRGroupType extends AbstractGroupType
{
    const FIXO_LOCAL = ['value' => 'FIXO_LOCAL', 'label'=> 'Fixo local'];
    const FIXO_REGIONAL = ['value' => 'FIXO_REGIONAL', 'label'=> 'Fixo regional'];
    const FIXO_NACIONAL = ['value' => 'FIXO_NACIONAL', 'label'=> 'Fixo nacional'];
    const VC1 = ['value' => 'VC1', 'label'=> 'VC1 - Celular local'];
    const VC2 = ['value' => 'VC2', 'label'=> 'VC2 - Celular do mesmo estado'];
    const VC3 = ['value' => 'VC3', 'label'=> 'VC3 - Celular nacional'];
    const G0800 = ['value' => '0800', 'label'=> '0800'];
    const G0300 = ['value' => '0300', 'label'=> '0300'];
    const G0500 = ['value' => '0500', 'label'=> '0500'];
    const G0900 = ['value' => '0900', 'label'=> '0900'];
    const SERVICE = ['value' => 'SERVICE', 'label'=> 'Serviços'];

    public function getResource()
    {
     return [
         self::FIXO_LOCAL,
         self::FIXO_NACIONAL,
         self::VC1,
         self::VC2,
         self::VC3,
         self::G0800,
         self::G0300,
         self::G0900,
         self::G0500,
         self::SERVICE,
         self::INTERNATIONAL
     ];
    }
}
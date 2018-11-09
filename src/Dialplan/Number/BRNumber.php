<?php

namespace App\Dialplan\Number;

use App\Dialplan\Format\BRFormat;
use App\Dialplan\Type\BRGroupType;

class BRNumber extends AbstractNumber
{
    protected function getDDI()
    {
        return '55';
    }

    protected function formatE164()
    {
        $number = ltrim($this->getOriginalNumber(), '0');

        if (preg_match('/^1[0-9]{2,7}$/', $number)) {
            return $number;
        }

        if (preg_match('/^(400[0-9]|3003)/', $number)) {
            return $number;
        }

        if (preg_match('/^([38]00)/', $number)) {
            $number = '0' . $number;
        } elseif (preg_match('/^[9]?[0-9]{8}$/', $number)) {
            $number = $this->getDDD() . $number;
        }

        $number = $this->getDDI() . $number;

        return $number;
    }

    protected function setGroup()
    {
        if (preg_match('/^1[0-9]{2,7}$/', $this->getNumber())) {
            return BRGroupType::SERVICE;
        }

        if (preg_match('/^550800/', $this->getNumber())) {
            return BRGroupType::G0800;
        }

        if (preg_match('/^550300/', $this->getNumber())) {
            return BRGroupType::G0300;
        }

        if (preg_match('/^550500/', $this->getNumber())) {
            return BRGroupType::G0500;
        }

        if (preg_match('/^550900/', $this->getNumber())) {
            return BRGroupType::G0900;
        }

        // 4004 4003 3003
        if (preg_match('/^(400[34]|3003)/', $this->getNumber())) {
            return BRGroupType::FIXO_LOCAL;
        }

        // SE É FIXO LOCAL
        $pattern = sprintf('/^55(%s)[0-9]{8}$/', $this->getDDD());
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::FIXO_LOCAL;
        }

        // SE É FIXO REGIONAL - TODO FAZER PELO CNL

        // SE É FIXO NACIONAL
        $pattern = sprintf('/^55([^%s][^%s])[0-9]{8}$/', $this->getDDD()[0], $this->getDDD()[1]);
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::FIXO_NACIONAL;
        }

        // SE É CELULAR VC1
        $pattern = sprintf('/^55[%s][%s]9[0-9]{8}$/', $this->getDDD()[0], $this->getDDD()[1]);
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::VC1;
        }

        // SE É CELULAR VC2
        $pattern = sprintf('/^55[%s][^%s]9[0-9]{8}$/', $this->getDDD()[0], $this->getDDD()[1]);
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::VC2;
        }

        // SE É CELULAR VC3
        $pattern = sprintf('/^55[^%s][^%s]9[0-9]{8}$/', $this->getDDD()[0], $this->getDDD()[1]);
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::VC3;
        }

        $groupNextel = $this->getGroupNextel();
        if ($groupNextel !== null) {
            return $groupNextel;
        }

        return self::INTERNATIONAL;
    }

    private function getGroupNextel()
    {
        // SE É NEXTEL
        if (!preg_match('/^55117[9870][0-9]{6}$/', $this->getNumber()) && !preg_match('/^55[12][2-9]7[078][0-9]{6}$/', $this->getNumber())) {
            return null;
        }

        // SE É CELULAR VC1
        $pattern = sprintf('/^55(%s)(%s)[0-9]{8}$/', $this->getDDD()[0], $this->getDDD()[1]);
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::VC1;
        }

        // SE É CELULAR VC2
        $pattern = sprintf('/^55(%s)(^%s)[0-9]{8}$/', $this->getDDD()[0], $this->getDDD()[1]);
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::VC2;
        }

        // SE É CELULAR VC3
        $pattern = sprintf('/^55(^%s)(^%s)[0-9]{8}$/', $this->getDDD()[0], $this->getDDD()[1]);
        if (preg_match($pattern, $this->getNumber())) {
            return BRGroupType::VC3;
        }

    }


    public function getDialNumber($format, $operator = null, $prefix = null, $sufix = null)
    {
        $number = $this->getNumber();

        switch ($format) {
            case BRFormat::SIMPLE['value']:
                $number = $this->getOriginalNumber();

                if (preg_match('/^[9]?[0-9]{3,8}$/', $number)) {
                    return $prefix . $number . $sufix;
                }

                if (preg_match('/^0[3589]00/', $number)) {
                    return $prefix . $number . $sufix;
                }

                $number = 0 . $operator . substr($this->getNumber(), 2);
                break;
            case BRFormat::DDD['value']:
                $number =  $operator . substr($this->getNumber(), 2);
                break;
            case BRFormat::E164['value']:
                $number = substr($this->getNumber(), 0, 2) . $operator . substr($this->getNumber(), 2);
                break;

        }

        return $prefix . $number . $sufix;
    }
}
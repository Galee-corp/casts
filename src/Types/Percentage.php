<?php

namespace Galee\Casts\Types;

use Galee\Casts\Cast;
use Galee\Casts\Contracts\Castable;

class Percentage extends Cast implements Castable
{
    public function normalize()
    {
        if (is_string($this->value)) {
            $this->value = $this->stringToFloat($this->value);
        }

        $this->value = round($this->value, 2);

        if (is_float($this->value) && $this->floatDecimalEqualsZero($this->value)) {
            $this->value = $this->floatToInt($this->value);
        }
    }

    public function get(): string
    {
        return $this->value.' %';
    }
}

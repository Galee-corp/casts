<?php

namespace Galee\Casts\Types;

use Galee\Casts\Cast;
use Galee\Casts\Contracts\Castable;

class Ratio extends Cast implements Castable
{
    public function normalize()
    {
        if (is_string($this->value)) {
            $this->value = $this->stringToFloat($this->value);
        }

        $this->value = round($this->value, 2);
    }
}

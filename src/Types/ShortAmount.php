<?php

namespace Galee\Casts\Types;

use Galee\Casts\Cast;
use Galee\Casts\Contracts\Castable;

class ShortAmount extends Cast implements Castable
{
    public function normalize()
    {
        if (is_string($this->value)) {
            $this->value = $this->stringToFloat($this->value);
        }

        $this->value = $this->abbr(
            $this->floatToInt($this->value)
        );
    }

    private function abbr(int $value): string
    {
        [$format, $suffix] = match (true) {
            ($value < 0) => $this->abbrNegative($value),
            default => $this->abbrPositive($value),
        };

        return ! empty($format.$suffix) ? trim($format.' '.$suffix) : 0;
    }

    private function abbrPositive(int $num): array
    {
        return match (true) {
            ($num >= 0 && $num < 1000) => [$num, ' '],
            ($num >= 1000 && $num < 1000000) => [round($num / 1000, 1), 'K'],
            ($num >= 1000000 && $num < 1000000000) => [round($num / 1000000, 1), 'M'],
            ($num >= 1000000000 && $num < 1000000000000) => [round($num / 1000000000, 1), 'B'],
            ($num >= 1000000000000) => [round($num / 1000000000000, 1), 'T'],
            default => [$num, ' ']
        };
    }

    private function abbrNegative(int $num): array
    {
        return match (true) {
            ($num <= 0 && $num > -1000) => [$num, ' '],
            ($num <= -1000 && $num > -1000000) => [round($num / 1000, 1), 'K'],
            ($num <= -1000000 && $num > -1000000000) => [round($num / 1000000, 1), 'M'],
            ($num <= -1000000000 && $num > -1000000000000) => [round($num / 1000000000, 1), 'B'],
            ($num <= -1000000000000) => [round($num / 1000000000000, 1), 'T'],
            default => [$num, ' ']
        };
    }
}

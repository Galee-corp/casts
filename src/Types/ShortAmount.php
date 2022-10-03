<?php

namespace Galee\Casts\Types;

use Galee\Casts\Cast;
use Galee\Casts\Contracts\Castable;
use NumberFormatter as NativeNumberFormatter;

class ShortAmount extends Cast implements Castable
{
    public function normalize()
    {
        if (is_string($this->value)) {
            $this->value = $this->stringToFloat($this->value);
        }

        $this->value = $this->abbr($this->value);
    }

    private function abbr(): string
    {
        $num = $this->toInt($this->value);

        [$format, $suffix] = match (true) {
            ($num < 0) => $this->abbrNegative($num),
            default => $this->abbrPositive($num),
        };

        return !empty($format . $suffix) ? trim($format . ' ' . $suffix) : 0;
    }

    private function toInt(): int
    {
        $numberFormatter = new NativeNumberFormatter('en_EN', NativeNumberFormatter::DECIMAL, '# ##0,###');

        return intval($numberFormatter->parse($this->value));
    }


    private function abbrPositive(int $num): array
    {
        return match (true) {
            ($num >= 0 && $num < 1000) => [$num, ' '],
            ($num >= 1000 && $num < 1000000) => [round($num / 1000, 1), 'K'],
            ($num >= 1000000 && $num < 1000000000) => [round($num / 1000000, 1), 'M'],
            ($num >= 1000000000 && $num < 1000000000000) => [round($num / 1000000000, 1), 'B'],
            ($num >= 1000000000000) => [round($num / 1000000000000, 1), 'T']
        };
    }

    private function abbrNegative(int $num): array
    {
        return match (true) {
            ($num <= 0 && $num > -1000) => [$num, ' '],
            ($num <= -1000 && $num > -1000000) => [round($num / 1000, 1), 'K'],
            ($num <= -1000000 && $num > -1000000000) => [round($num / 1000000, 1), 'M'],
            ($num <= -1000000000 && $num > -1000000000000) => [round($num / 1000000000, 1), 'B'],
            ($num <= -1000000000000) => [round($num / 1000000000000, 1), 'T']
        };
    }
}

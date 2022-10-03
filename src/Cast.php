<?php

namespace Galee\Casts;

use Galee\Casts\Exceptions\MissingValueException;
use Illuminate\Support\Str;
use NumberFormatter as NativeNumberFormatter;

abstract class Cast
{
    protected $value;

    public function __construct(mixed $value = null)
    {
        if (is_null($value)) {
            throw new MissingValueException('value cannot be null');
        }

        call_user_func([$this, 'normalize'], $this->value = $value);
    }

    public function get()
    {
        return $this->value;
    }

    protected function stringToFloat(string $value): float
    {
        $value = preg_replace('/[^0-9\.\-]/', '', $value);

        if (Str::of($value)->startsWith('-')) {
            $value = Str::of($value)
                ->after('-')->remove('-')->prepend('-')
                ->toString();
        }

        return floatval($value);
    }

    protected function floatToInt($value): int
    {
        $numberFormatter = new NativeNumberFormatter('en_EN', NativeNumberFormatter::DECIMAL, '# ##0,###');

        return intval($numberFormatter->parse($value));
    }

    protected function floatDecimalEqualsZero(float $value): bool
    {
        return $value - floor($value) === 0.0;
    }
}

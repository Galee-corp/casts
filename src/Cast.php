<?php

namespace Galee\Casts;

use Illuminate\Support\Str;
use Galee\Casts\Exceptions\MissingValueException;

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

    protected function floatDecimalEqualsZero(float $value): bool
    {
        return $value - floor($value) === 0.0;
    }
}

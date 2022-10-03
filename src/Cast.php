<?php

namespace Galee\Casts;

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
        return floatval(preg_replace('/[^0-9\.]/', '', $value));
    }

    protected function floatDecimalEqualsZero(float $value): bool
    {
        return $value - floor($value) === 0.0;
    }
}

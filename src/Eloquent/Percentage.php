<?php

namespace Galee\Casts\Eloquent;

use Galee\Casts\Types\Percentage as TypesPercentage;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Percentage implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \Galee\Casts\Types\Percentage
     */
    public function get($model, $key, $value, $attributes)
    {
        return new TypesPercentage($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return (new TypesPercentage($value))->get();
    }
}

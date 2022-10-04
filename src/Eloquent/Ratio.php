<?php

namespace Galee\Casts\Eloquent;

use Galee\Casts\Types\Ratio as TypesRatio;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Ratio implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \Galee\Casts\Types\Ratio
     */
    public function get($model, $key, $value, $attributes)
    {
        return new TypesRatio($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return float
     */
    public function set($model, $key, $value, $attributes)
    {
        return (new TypesRatio($value))->get();
    }
}

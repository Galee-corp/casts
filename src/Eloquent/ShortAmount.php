<?php

namespace Galee\Casts\Eloquent;

use Galee\Casts\Types\ShortAmount as TypesShortAmount;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class ShortAmount implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \Galee\Casts\Types\ShortAmount
     */
    public function get($model, $key, $value, $attributes)
    {
        return new TypesShortAmount($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }
}

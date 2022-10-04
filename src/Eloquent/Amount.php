<?php

namespace Galee\Casts\Eloquent;

use Galee\Casts\Types\Amount as TypesAmount;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Amount implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \Galee\Casts\Types\Amount
     */
    public function get($model, $key, $value, $attributes)
    {
        return (new TypesAmount($value));
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed   $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        return (new TypesAmount($value))->get();
    }
}

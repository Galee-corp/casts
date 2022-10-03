<?php

namespace Galee\Casts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Galee\Casts\Cast
 */
class Cast extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Galee\Casts\Cast::class;
    }
}

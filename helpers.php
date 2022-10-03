<?php

use Galee\Casts\Types\Amount;
use Galee\Casts\Types\Percentage;
use Galee\Casts\Types\Ratio;
use Galee\Casts\Types\ShortAmount;

if (! function_exists('amount')) {
    function amount($value)
    {
        return (new Amount($value))->get();
    }
}

if (! function_exists('percentage')) {
    function percentage($value)
    {
        return (new Percentage($value))->get();
    }
}

if (! function_exists('ratio')) {
    function ratio($value)
    {
        return (new Ratio($value))->get();
    }
}

if (! function_exists('shortAmount')) {
    function shortAmount($value)
    {
        return (new ShortAmount($value))->get();
    }
}

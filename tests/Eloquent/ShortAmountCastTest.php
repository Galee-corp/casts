<?php

use Galee\Casts\Eloquent\ShortAmount;
use Galee\Casts\Types\ShortAmount as TypesShortAmount;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertEquals;

it('casts a model attribute to a short-amount type class', function () {
    class DummyShortAmount extends Model
    {
        protected $fillable = [
            'short_amount',
        ];

        protected $casts = [
            'short_amount' => ShortAmount::class,
        ];
    }

    $modelShortAmount = DummyShortAmount::make([
        'short_amount' => '1234.00'
    ])->short_amount;

    assertInstanceOf(TypesShortAmount::class, $modelShortAmount);
    assertEquals('1.2 K', $modelShortAmount->get());
});

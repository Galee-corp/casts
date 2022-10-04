<?php

use Galee\Casts\Eloquent\Amount;
use Galee\Casts\Types\Amount as TypesAmount;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertEquals;

it('casts a model attribute to an amount type class', function () {
    class DummyAmount extends Model
    {
        protected $fillable = [
            'amount',
        ];

        protected $casts = [
            'amount' => Amount::class,
        ];
    }

    $modelAmount = DummyAmount::make([
        'amount' => '1234.00'
    ])->amount;

    assertInstanceOf(TypesAmount::class, $modelAmount);
    assertEquals(1234, $modelAmount->get());
});

<?php

use Galee\Casts\Eloquent\Percentage;
use Galee\Casts\Types\Percentage as TypesPercentage;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertEquals;

it('casts a model attribute to a percentage type class', function () {
    class DummyPercent extends Model
    {
        protected $fillable = [
            'percentage',
        ];

        protected $casts = [
            'percentage' => Percentage::class,
        ];
    }

    $modelPercentage = DummyPercent::make([
        'percentage' => '12.00'
    ])->percentage;

    assertInstanceOf(TypesPercentage::class, $modelPercentage);
    assertEquals('12 %', $modelPercentage->get());
});

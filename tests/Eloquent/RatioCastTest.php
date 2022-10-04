<?php

use Galee\Casts\Eloquent\Ratio;
use Galee\Casts\Types\Ratio as TypesRatio;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it('casts a model attribute to a ratio type class', function () {
    class DummyRatio extends Model
    {
        protected $fillable = [
            'ratio',
        ];

        protected $casts = [
            'ratio' => Ratio::class,
        ];
    }

    $modelRatio = DummyRatio::make([
        'ratio' => '1.10',
    ])->ratio;

    assertInstanceOf(TypesRatio::class, $modelRatio);
    assertEquals(1.1, $modelRatio->get());
});

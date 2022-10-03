<?php

use Galee\Casts\Exceptions\MissingValueException;
use Galee\Casts\Types\Ratio;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertIsFloat;

it('can instantiate a new ratio cast-type class', function () {
    assertInstanceOf(Ratio::class, new Ratio('1.42'));
});

it('cannot instatiate a new ratio if the value is not set', function () {
    $this->expectException(MissingValueException::class);
    new Ratio(null);
});

it('returns a float ratio', function () {
    assertIsFloat($value = ratio('1234.45'));
    assertEquals($value, 1234.45);

    assertIsFloat($value = ratio(1234.45));
    assertEquals($value, 1234.45);

    assertIsFloat($value = ratio(1234.0001));
    assertEquals($value, 1234.0);

    assertIsFloat($value = ratio(1234));
    assertEquals($value, 1234.0);
});

it('converts various string formats to correct ratio', function () {
    assertIsFloat($value = ratio('z1234,56%'));
    assertEquals($value, 123456.0);

    assertIsFloat($value = ratio('z1234.56tz'));
    assertEquals($value, 1234.56);

    assertIsFloat($value = ratio('z1234,00tz'));
    assertEquals($value, 123400.0);

    assertIsFloat($value = ratio('z1234.0001tz'));
    assertEquals($value, 1234.0);
});

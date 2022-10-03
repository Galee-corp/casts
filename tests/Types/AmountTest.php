<?php

use Galee\Casts\Exceptions\MissingValueException;
use Galee\Casts\Types\Amount;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertIsFloat;
use function PHPUnit\Framework\assertIsInt;

it('can instantiate a new amount cast-type class', function () {
    assertInstanceOf(Amount::class, new Amount('1234'));
});

it('cannot instatiate a new amount if the value is not set', function () {
    $this->expectException(MissingValueException::class);
    new Amount(null);
});

it('returns a float amount', function () {
    assertIsFloat($value = amount('1234.45'));
    assertEquals($value, 1234.45);

    assertIsFloat($value = amount(1234.45));
    assertEquals($value, 1234.45);

    assertIsInt($value = amount(1234.0001));
    assertEquals($value, 1234);
});

it('returns an integer amount', function () {
    assertIsInt($value = amount(1234));
    assertEquals($value, 1234);

    assertIsInt($value = amount(1234.0));
    assertEquals($value, 1234);

    assertIsInt($value = amount('1234'));
    assertEquals($value, 1234);

    assertIsInt($value = amount('1234.0'));
    assertEquals($value, 1234);
});

it('converts various string formats to float or int', function () {
    assertIsInt($value = amount('z1234,56tz'));
    assertEquals($value, 123456);

    assertIsFloat($value = amount('z1234.56tz'));
    assertEquals($value, 1234.56);

    assertIsInt($value = amount('z1234,00tz'));
    assertEquals($value, 123400);

    assertIsInt($value = amount('z1234.0001tz'));
    assertEquals($value, 1234);
});

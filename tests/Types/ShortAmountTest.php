<?php

use Galee\Casts\Exceptions\MissingValueException;
use Galee\Casts\Types\ShortAmount;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertIsString;

it('can instantiate a new short-amount cast-type class', function () {
    assertInstanceOf(ShortAmount::class, new ShortAmount('1234'));
});

it('cannot instatiate a new short-amount if the value is not set', function () {
    $this->expectException(MissingValueException::class);
    new ShortAmount(null);
});

it('returns a string short-amount', function () {
    assertIsString($value = shortAmount('1234.45'));
    assertEquals($value, '1.2 K');

    assertIsString($value = shortAmount(1234.45));
    assertEquals($value, '1.2 K');

    assertIsString($value = shortAmount(1234.0001));
    assertEquals($value, '1.2 K');

    assertIsString($value = shortAmount('12340.45'));
    assertEquals($value, '12.3 K');

    assertIsString($value = shortAmount(1234000.45));
    assertEquals($value, '1.2 M');

    assertIsString($value = shortAmount(1123400000.45));
    assertEquals($value, '1.1 B');

    assertIsString($value = shortAmount(1123400000000.45));
    assertEquals($value, '1.1 T');

    assertIsString($value = shortAmount(-0));
    assertEquals($value, '0');

    assertIsString($value = shortAmount(-0.0));
    assertEquals($value, '0');
});

it('returns a negative string short-amount', function () {
    assertIsString($value = shortAmount('-0'));
    assertEquals($value, '0');

    assertIsString($value = shortAmount('-0.0'));
    assertEquals($value, '0');

    assertIsString($value = shortAmount('-1234.45'));
    assertEquals($value, '-1.2 K');

    assertIsString($value = shortAmount(-1234.45));
    assertEquals($value, '-1.2 K');

    assertIsString($value = shortAmount(-1234.0001));
    assertEquals($value, '-1.2 K');

    assertIsString($value = shortAmount('-12340.45'));
    assertEquals($value, '-12.3 K');

    assertIsString($value = shortAmount(-1234000.45));
    assertEquals($value, '-1.2 M');

    assertIsString($value = shortAmount(-1123400000.45));
    assertEquals($value, '-1.1 B');

    assertIsString($value = shortAmount(-1123400000000.45));
    assertEquals($value, '-1.1 T');
});

it('converts various string formats to correct percentage', function () {
    assertIsString($value = shortAmount('-z1234,56%'));
    assertEquals($value, '-123.5 K');

    assertIsString($value = shortAmount('z-1234.56tz'));
    assertEquals($value, '-1.2 K');

    assertIsString($value = shortAmount('z1234,00tz'));
    assertEquals($value, '123.4 K');

    assertIsString($value = shortAmount('z1234.0001tz'));
    assertEquals($value, '1.2 K');
});

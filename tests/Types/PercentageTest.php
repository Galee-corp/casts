<?php

use Galee\Casts\Exceptions\MissingValueException;
use Galee\Casts\Types\Percentage;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertIsString;

it('can instantiate a new percentage cast-type class', function () {
    assertInstanceOf(Percentage::class, new Percentage('1234'));
});

it('cannot instatiate a new percentage if the value is not set', function () {
    $this->expectException(MissingValueException::class);
    new Percentage(null);
});

it('returns a string percentage', function () {
    assertIsString($value = percentage('1234.45'));
    assertEquals($value, '1234.45 %');

    assertIsString($value = percentage(1234.45));
    assertEquals($value, '1234.45 %');

    assertIsString($value = percentage(1234.0001));
    assertEquals($value, '1234 %');
});

it('converts various string formats to correct percentage', function () {
    assertIsString($value = percentage('z1234,56%'));
    assertEquals($value, '123456 %');

    assertIsString($value = percentage('z1234.56tz'));
    assertEquals($value, '1234.56 %');

    assertIsString($value = percentage('z1234,00tz'));
    assertEquals($value, '123400 %');

    assertIsString($value = percentage('z1234.0001tz'));
    assertEquals($value, '1234 %');
});

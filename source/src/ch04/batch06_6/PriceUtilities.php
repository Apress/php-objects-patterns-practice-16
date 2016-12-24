<?php
declare(strict_types=1);

namespace popp\ch04\batch06_6;

/* listing 04.33 */
trait PriceUtilities
{
    private static $taxrate = 17;

    public static function calculateTax(float $price): float
    {
        return ((self::$taxrate / 100) * $price);
    }

    // other utilities
}

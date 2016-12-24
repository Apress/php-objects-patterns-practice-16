<?php
declare(strict_types=1);

namespace popp\ch04\batch06_7;

/* listing 04.36 */
trait PriceUtilities
{
    public function calculateTax(float $price): float
    {
        // is this good design?
        return (($this->taxrate / 100) * $price);
    }

    // other utilities
}

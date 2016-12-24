<?php
declare(strict_types=1);

namespace popp\ch04\batch06_1;

/* listing 04.12 */
trait PriceUtilities
{
    private $taxrate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
    }

    // other utilities
}

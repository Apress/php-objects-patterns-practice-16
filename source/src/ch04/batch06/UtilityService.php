<?php
declare(strict_types=1);

namespace popp\ch04\batch06;

class UtilityService extends Service
{
    private $taxrate = 17;

    public function calculateTax(float $price): float
    {
        return ( ( $this->taxrate/100 ) * $price );
    }
}

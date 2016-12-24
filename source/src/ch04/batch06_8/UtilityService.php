<?php
declare(strict_types=1);

namespace popp\ch04\batch06_8;

/* listing 04.40 */
class UtilityService extends Service
{
    use PriceUtilities;

    public function getTaxRate(): float
    {
        return 17;
    }
}

<?php
declare(strict_types=1);

namespace popp\ch04\batch06_7;

/* listing 04.37 */
class UtilityService extends Service
{
    public $taxrate = 17;
    use PriceUtilities;
}

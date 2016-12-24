<?php
declare(strict_types=1);

namespace popp\ch04\batch06_4;

/* listing 04.29 */
class UtilityService extends Service
{
    use PriceUtilities, TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
    }
}
/* /listing 04.29 */

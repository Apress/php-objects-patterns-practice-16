<?php
declare(strict_types=1);

namespace popp\ch04\batch06_5;

/* listing 04.31 */
class UtilityService extends Service
{

    use PriceUtilities, TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
        PriceUtilities::calculateTax as basicTax;
    }
}

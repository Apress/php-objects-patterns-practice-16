<?php
declare(strict_types=1);

namespace popp\ch04\batch08;

/* listing 04.94 */
class Totalizer
{
    public static function warnAmount()
    {
        return function (Product $product) {
            if ($product->price > 5) {
                print "    reached high price: {$product->price}\n";
            }
        };
    }
}
// done

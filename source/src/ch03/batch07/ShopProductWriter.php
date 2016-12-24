<?php
namespace popp\ch03\batch07;

use popp\ch03\batch04\ShopProduct;

/* listing 03.18 */
class ShopProductWriter
{
    public function write($shopProduct)
    {
        $str  = $shopProduct->title . ": "
            . $shopProduct->getProducer()
            . " (" . $shopProduct->price . ")\n";
        print $str;
    }
}
/* /listing 03.18 */

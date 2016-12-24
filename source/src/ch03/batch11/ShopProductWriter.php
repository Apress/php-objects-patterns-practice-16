<?php
namespace popp\ch03\batch11;

/* listing 03.34 */
class ShopProductWriter
{
    public function write($shopProduct)
    {
        if (
            ! ($shopProduct instanceof CdProduct) &&
            ! ($shopProduct instanceof BookProduct)
        ) {
            die("wrong type supplied");
        }
        $str  = "{$shopProduct->title}: "
             . $shopProduct->getProducer()
             . " ({$shopProduct->price})\n";
        print $str;
    }
}
/* /listing 03.34 */

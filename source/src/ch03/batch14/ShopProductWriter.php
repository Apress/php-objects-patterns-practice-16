<?php
namespace popp\ch03\batch14;

use popp\ch03\batch14\ShopProduct;

/* listing 03.46 */
class ShopProductWriter
{
    public $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write()
    {
        $str =  "";
        foreach ($this->products as $shopProduct) {
            $str .= "{$shopProduct->title}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        print $str;
    }
}
/* /listing 03.46 */

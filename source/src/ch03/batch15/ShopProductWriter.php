<?php
declare(strict_types=1);
namespace popp\ch03\batch15;

use popp\ch03\batch15\ShopProduct;

class ShopProductWriter
{
/* listing 03.47 */
    private $products = [];
/* /listing 03.47 */

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write()
    {
        $str =  "";
        foreach ($this->products as $shopProduct) {
            $str .= "{$shopProduct->getTitle()}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        print $str;
    }
}

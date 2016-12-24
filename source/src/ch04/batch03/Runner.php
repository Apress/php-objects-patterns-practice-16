<?php
declare(strict_types=1);

namespace popp\ch04\batch03;

use popp\ch04\batch02\ShopProduct;
use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class Runner
{
    public static function run()
    {
        // runner code here
        print ShopProduct::AVAILABLE;
    }


    public static function run2()
    {

        // demonstrate abstract instantiation error
        // commented out so that tests run!
        // $writer = new ShopProductWriter();

        $product1 = new BookProduct("My Antonia", "Willa", "Cather", 5.99, 300);
        $product2 =   new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            60
        );

        $textwriter = new TextProductWriter();
        $textwriter->addProduct($product1);
        $textwriter->addProduct($product2);
        $textwriter->write();

        $xmlwriter = new XmlProductWriter();
        $xmlwriter->addProduct($product1);
        $xmlwriter->addProduct($product2);
        $xmlwriter->write();
    }
}

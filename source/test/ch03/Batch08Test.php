<?php

namespace popp\ch03;

require_once("vendor/autoload.php");

// no need to create a copy in this batch
use popp\ch03\batch04\ShopProduct;
use popp\ch03\batch08\ShopProductWriter;
use popp\ch03\batch08\Runner;

class Batch08Test extends \PHPUnit_Framework_TestCase
{
    public function testProductWriter()
    {
        
        $product = new ShopProduct("title", "first", "main", 99);
        self::assertTrue($product instanceof ShopProduct);
        self::assertEquals($product->title, "title");
        self::assertEquals($product->producerFirstName, "first");
        self::assertEquals($product->producerMainName, "main");
        self::assertEquals($product->price, 99);
        $spw = new ShopProductWriter();

        ob_start();
        $spw->write($product);
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("title: first main (99)\n", $output1);
      
        // uncomment to cause fatal caused by wrong type passed to write() method
        // Runner::run1();
    }
}

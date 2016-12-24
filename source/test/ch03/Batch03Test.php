<?php

namespace popp\ch03;

require_once("vendor/autoload.php");

use popp\ch03\batch03\ShopProduct;
use popp\ch03\batch03\Runner;

class Batch03Test extends \PHPUnit_Framework_TestCase
{
    public function testProduct()
    {
        $blah = new ShopProduct();
        self::assertTrue($blah instanceof ShopProduct);
        
        ob_start();
        Runner::run1();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Willa Cather\n", $output);
    }
}

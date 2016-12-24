<?php

namespace popp\ch03;

require_once("vendor/autoload.php");

use popp\ch03\batch01\ShopProduct;
use popp\ch03\batch01\Runner;

class Batch01Test extends \PHPUnit_Framework_TestCase
{
    function testProduct()
    {
        $blah = new ShopProduct();
        self::assertTrue($blah instanceof ShopProduct);
        ob_start();
        Runner::run();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertRegexp("|object\\(popp\\\\ch03\\\\batch01\\\\ShopProduct\\)#|", $output);
    }
}

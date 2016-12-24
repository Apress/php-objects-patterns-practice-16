<?php

namespace popp\ch03;

require_once("vendor/autoload.php");

use popp\ch03\batch10\ConfReader;
use popp\ch03\batch10\Runner;

class Batch10Test extends \PHPUnit_Framework_TestCase
{
    public function testAddressManager()
    {

        try {
            Runner::run1();
            self::fail("Exception should have been thrown");
        } catch (\TypeError $e) {
        }
    }

    public function testOptionalValue()
    {
        $reader = new ConfReader();
        $values = $reader->getValues(["name"=>"harry", "color"=>"blue"]);
        self::assertTrue(isset($values['name']) && $values['name'] == "mary");
        self::assertTrue(isset($values['color']) && $values['color'] == "blue");
    }

    public function testShopProduct() {
        ob_start();
        Runner::run2();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Willa Cather\nartist: The Alabama 3\n", $output);
    }
}

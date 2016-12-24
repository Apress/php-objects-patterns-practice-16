<?php

namespace popp\ch03;

require_once("vendor/autoload.php");

use popp\ch03\batch05\AddressManager;
use popp\ch03\batch05\Runner;

class Batch05Test extends \PHPUnit_Framework_TestCase
{
    public function testAddressManager()
    {
        $aman = new AddressManager();
 
        ob_start();
        $aman->outputAddresses(false);
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("209.131.36.159\n216.58.213.174\n", $output1);

        ob_start();
        $aman->outputAddresses(true);
        $output2 = ob_get_contents();
        ob_end_clean();
        self::assertRegexp("|209.131.36.159 \\(.*?\\)\n216.58.213.174 \\(.*?\\)\n|", $output2);

        ob_start();
        Runner::run1();
        $output3 = ob_get_contents();
        ob_end_clean();
        // should be mistakenly true (because "false" == true)
        self::assertRegexp("|209.131.36.159 \\(.*?\\)\n216.58.213.174 \\(.*?\\)\n|", $output3);
    }
}

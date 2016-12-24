<?php
declare(strict_types=1);

namespace popp\ch11\batch06;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertRegexp("|sending mail to sysadmin|", $val);
        self::assertRegexp("|add login data to log|", $val);
        //print $val;
        
    }
}

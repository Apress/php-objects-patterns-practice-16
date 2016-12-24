<?php

namespace popp\ch06\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;


class Batch01Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertRegexp("/key1/", $val);
        self::assertRegexp("/val1/", $val);

        self::assertRegexp("/key2/", $val);
        self::assertRegexp("/val2/", $val);

        self::assertRegexp("/key3/", $val);
        self::assertRegexp("/val3/", $val);
        
    }
}


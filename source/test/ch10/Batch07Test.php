<?php

namespace popp\ch10\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function () {
            Runner::run();
        });
        self::assertRegexp("/authenticating request/", $val);
        self::assertRegexp("/structuring request data/", $val);
        self::assertRegexp("/logging request/", $val);
        self::assertRegexp("/doing something useful with request/", $val);
    }
}

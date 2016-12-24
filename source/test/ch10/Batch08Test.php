<?php

namespace popp\ch10\batch08;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch08Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function () {
            Runner::run();
        });

        self::assertRegexp("/gents hat/", $val);
        self::assertRegexp("/ladies jumper/", $val);
        self::assertRegexp("/Product Object/", $val);
        self::assertRegexp("/234/", $val);
        self::assertRegexp("/532/", $val);

        $val = $this->capture(function () {
            Runner::run2();
        });
        print $val;

    }
}

<?php
declare(strict_types=1);

namespace popp\ch09\batch03;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch03Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        $test = "mary: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertRegexp("/$test/", $val);
        $test = "bob: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertRegexp("/$test/", $val);
        $test = "harry: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertRegexp("/$test/", $val);
    }
}

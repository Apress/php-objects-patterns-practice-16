<?php
declare(strict_types=1);

namespace popp\ch04\batch01;

class Runner
{
    public static function run()
    {
        // runner code here
        print StaticExample::$aNum;
        StaticExample::sayHello();
    }

    public static function run2()
    {
        StaticExample2::sayHello();
        StaticExample2::sayHello();
        StaticExample2::sayHello();
    }
}

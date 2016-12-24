<?php
declare(strict_types=1);

namespace popp\ch04\batch01;

/* listing 04.01 */
class StaticExample
{
    static public $aNum = 0;
    public static function sayHello()
    {
        print "hello";
    }
}

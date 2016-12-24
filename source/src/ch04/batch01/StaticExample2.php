<?php
declare(strict_types=1);

namespace popp\ch04\batch01;

/* listing 04.02 */
class StaticExample2
{
    static public $aNum = 0;
    public static function sayHello()
    {
        self::$aNum++;
        print "hello (".self::$aNum.")\n";
    }
}

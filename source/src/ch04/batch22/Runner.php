<?php
declare(strict_types=1);

namespace popp\ch04\batch22;

class Runner
{
    public static function run()
    {
/* listing 04.87 */
        $st = new StringThing();
        //print $st;
/* /listing 04.87 */
    }

    public static function run2()
    {
        $person = new Person();
        print $person;
        // Bob (age 44)
    }
}
//done

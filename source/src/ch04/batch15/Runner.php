<?php
declare(strict_types=1);

namespace popp\ch04\batch15;

class Runner
{
    public static function run()
    {
        // runner code here

        $p = new Person();
        if (isset($p->name)) {
            print $p->name;
        } else {
            print "nope\n";
        }
        // output:
        // Bob
    }
}

<?php
declare(strict_types=1);

namespace popp\ch04\batch17;

class Runner
{
    public static function run()
    {
        // runner code here

        $p = new Person();
        $p->name = "bob";
        $p->age  = 44;
        print_r($p);
    }
}

<?php
declare(strict_types=1);

namespace popp\ch05\batch07;

class OtherShop
{
    public function thing()
    {
        print "thing\n";
    }

    public function andAnotherthing($a, $b)
    {
        print "another thing ($a, $b)\n";
    }
}

<?php
declare(strict_types=1);

namespace popp\ch04\batch06_8;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06Test extends BaseUnit 
{

    public function testRunner()
    {

        $val = $this->capture(function() { Runner::run(); });
        print $val;

    }
}

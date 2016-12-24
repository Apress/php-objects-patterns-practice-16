<?php
declare(strict_types=1);

namespace popp\ch04\batch18;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch18Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        print $val;
        
    }
}
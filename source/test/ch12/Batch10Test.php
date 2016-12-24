<?php
declare(strict_types=1);

namespace popp\ch12\batch10;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch10Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        print $val;
        
    }
}
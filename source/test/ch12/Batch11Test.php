<?php
declare(strict_types=1);

namespace popp\ch12\batch11;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch11Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        print $val;
        
    }
}
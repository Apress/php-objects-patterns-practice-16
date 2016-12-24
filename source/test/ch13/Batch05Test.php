<?php
declare(strict_types=1);

namespace popp\ch13\batch05;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch05Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        
        $val = $this->capture(function() { Runner::run2(); });
        print $val;
    }
}

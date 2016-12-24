<?php
declare(strict_types=1);

namespace popp\ch05\batch05;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch05Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runbefore(); });
        print $val;

        $val = $this->capture(function() { Runner::run(); });
        print $val;
        
        $val = $this->capture(function() { Runner::run2(); });
        print $val;
        
        $val = $this->capture(function() { Runner::run3(); });
        print $val;

        $val = $this->capture(function() { Runner::run4(); });
        print $val;

        $val = $this->capture(function() { Runner::run5(); });
        print $val;

    }
}

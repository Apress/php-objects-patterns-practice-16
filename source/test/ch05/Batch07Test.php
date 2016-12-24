<?php
declare(strict_types=1);

namespace popp\ch05\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit 
{

    public function testRunner()
    {
//        $val = $this->capture(function() { Runner::run(); });
//        print $val;
        
//        $val = $this->capture(function() { Runner::run2(); });
//        print $val;

//        $val = $this->capture(function() { Runner::run3(); });
//        print $val;

//        $val = $this->capture(function() { Runner::run4(); });
//        print $val;

//        $val = $this->capture(function() { Runner::run5(); });
//        print $val;

//        $val = $this->capture(function() { Runner::run6(); });
//        print $val;

        $val = $this->capture(function() { Runner::run7(); });
        print $val;

return;
        $val = $this->capture(function() { Runner::run8(); });
        print $val;

    }
}

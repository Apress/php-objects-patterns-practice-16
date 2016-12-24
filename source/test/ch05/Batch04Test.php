<?php
declare(strict_types=1);

namespace popp\ch05\batch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch01Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runbefore(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run2(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run3(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run4(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run5(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run6(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run7(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run8(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run9(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run10(); });
        print $val;
        print "\n";

        $val = $this->capture(function() { Runner::run11(); });
        print $val;
        print "\n";




    }
}

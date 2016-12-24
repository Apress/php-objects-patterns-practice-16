<?php
declare(strict_types=1);

namespace popp\ch09\batch14;

use popp\ch09\batch06\BloggsApptEncoder;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch14Test extends BaseUnit
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertEquals($val, "Appointment data encoded in BloggsCal format\n");
        
    }

    public function testAssembler()
    {
        $assembler = new ObjectAssembler("src/ch09/batch14/objects.xml");
        $assembler->getComponent("\\popp\\ch09\\batch11\\TerrainFactory");

        $apptmaker = $assembler->getComponent("\\popp\\ch09\\batch14\\AppointmentMaker2");
        $out = $apptmaker->makeAppointment();
        self::assertEquals($out, "Appointment data encoded in BloggsCal format\n");
    }


    public function testNaiveEncoder()
    {
        $apptmaker = new AppointmentMaker();
        $out = $apptmaker->makeAppointment();
        self::assertEquals($out, "Appointment data encoded in BloggsCal format\n");
    }

    public function testLessNaiveEncoder()
    {
        $apptmaker = new AppointmentMaker2(new BloggsApptEncoder());
        $out = $apptmaker->makeAppointment();
        self::assertEquals($out, "Appointment data encoded in BloggsCal format\n");
    }
}

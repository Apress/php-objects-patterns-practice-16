<?php
declare(strict_types = 1);

namespace popp\ch09\batch14;

class Runner
{
    public static function run()
    {
/* listing 09.40 */
        $assembler = new ObjectAssembler("src/ch09/batch14/objects.xml");
        $apptmaker = $assembler->getComponent("\\popp\\ch09\\batch14\\AppointmentMaker2");
        $out = $apptmaker->makeAppointment();
        print $out;
/* /listing 09.40 */
    }
}

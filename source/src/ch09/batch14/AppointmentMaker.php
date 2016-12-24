<?php
declare(strict_types = 1);

namespace popp\ch09\batch14;

use popp\ch09\batch06\BloggsApptEncoder;

/* listing 09.37 */
class AppointmentMaker
{
    public function makeAppointment()
    {
        $encoder = new BloggsApptEncoder();
        return $encoder->encode();
    }
}

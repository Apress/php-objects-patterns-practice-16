<?php
declare(strict_types = 1);

namespace popp\ch09\batch08;

/* listing 09.21 */
class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encode in BloggsCal format\n";
    }
}

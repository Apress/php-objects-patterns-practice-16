<?php
declare(strict_types = 1);

namespace popp\ch09\batch05;

class PreferencesMock
{
    public function getDsn()
    {
        return "** test DSN\n";
    }
}

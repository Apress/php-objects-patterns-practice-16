<?php
declare(strict_types=1);

namespace popp\ch04\batch05;

class Consultancy extends TimedService implements Bookable, Chargeable
{
    // ...
    public function getPrice(): float
    {
        return 5.5;
    }
}

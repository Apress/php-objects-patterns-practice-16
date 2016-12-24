<?php
declare(strict_types = 1);

namespace popp\ch11\batch08;

class TroopCarrier extends CompositeUnit
{
    public function addUnit(Unit $unit)
    {
        if ($unit instanceof Cavalry) {
            throw new UnitException("Can't get a horse on the vehicle");
        }
        parent::addUnit($unit);
    }

    public function bombardStrength()
    {
        return 0;
    }
}

<?php
declare(strict_types = 1);

namespace popp\ch10\batch03;

class Tank extends Unit
{

    public function addUnit(Unit $unit)
    {
    }
    public function removeUnit(Unit $unit)
    {
    }

    public function bombardStrength(): int
    {
        return 4;
    }
}

<?php
declare(strict_types = 1);

namespace popp\ch10\batch02;

class Army
{
    private $units = [];
    private $armies = [];

    public function addUnit(Unit $unit)
    {
        array_push($this->units, $unit);
    }

/* listing 10.04 */
    public function addArmy(Army $army)
    {
        array_push($this->armies, $army);
    }
/* /listing 10.04 */

/* listing 10.05 */
    public function bombardStrength(): int
    {
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }

        foreach ($this->armies as $army) {
            $ret += $army->bombardStrength();
        }

        return $ret;
    }
/* /listing 10.05 */
}

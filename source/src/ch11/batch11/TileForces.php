<?php
declare(strict_types = 1);

namespace popp\ch11\batch11;

class TileForces
{
    public function __construct(int $x, int $y, UnitAcquisition $acq)
    {
        $this->x = $x;
        $this->y = $x;
        $this->units = $acq->getUnits($this->x, $this->y);
    }



/* listing 11.57 */

    // TileForces

    public function firepower()
    {
        $power = 0;

        foreach ($this->units as $unit) {
            if (! is_null($unit)) {
                $power += $unit->bombardStrength();
            }
        }

        return $power;
    }
/* /listing 11.57 */

    public function health()
    {
        $health = 0;

        foreach ($this->units as $unit) {
            if (! is_null($unit)) {
                $health += $unit->getHealth();
            }
        }

        return $health;
    }
}

<?php
declare(strict_types = 1);

namespace popp\ch11\batch10;

/* listing 11.53 */
class TileForces
{
    private $x;
    private $y;
    private $units = [];

    public function __construct(int $x, int $y, UnitAcquisition $acq)
    {
        $this->x = $x;
        $this->y = $x;
        $this->units = $acq->getUnits($this->x, $this->y);
    }

    // ...
/* /listing 11.53 */
/* listing 11.55 */

    // TileForces

    public function firepower(): int
    {
        $power = 0;

        foreach ($this->units as $unit) {
            // this conditional is added to prevent deliberate
            // mistake shown in book copy
            if (! is_null($unit)) {
            $power += $unit->bombardStrength();
            }
        }

        return $power;
    }
/* /listing 11.55 */

    public function health(): int
    {
        $health = 0;

        foreach ($this->units as $unit) {
            // this conditional is added to prevent deliberate
            // mistake shown in book copy
            if (! is_null($unit)) {
            $health += $unit->getHealth();
            }
        }

        return $health;
    }
/* listing 11.53 */
}
/* /listing 11.53 */

<?php
declare(strict_types=1);
namespace popp\ch08\batch02;

abstract class Lesson
{
    private $duration;
    private $costStrategy;

/* listing 08.18 */
    public function __construct(int $duration, CostStrategy $strategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }
/* /listing 08.18 */

    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    public function getDuration(): int
    {
        return $this->duration;
    }
    // more lesson methods...
}

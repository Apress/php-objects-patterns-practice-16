<?php
declare(strict_types=1);
namespace popp\ch08\batch03;

use popp\ch08\batch02\Lecture;
use popp\ch08\batch02\Seminar;
use popp\ch08\batch02\CostStrategy;
use popp\ch08\batch02\FixedCostStrategy;
use popp\ch08\batch02\TimedCostStrategy;

abstract class Lesson
{
    private $duration;
    private $costStrategy;

/* listing 08.17 */
    public function __construct(int $duration, FixedCostStrategy $strategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }
/* /listing 08.17 */

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

/*
abstract class CostStrategy
{
    public abstract function cost(Lesson $lesson):int ;
    public abstract function chargeType(): string;
}

class TimedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return ( $lesson->getDuration() * 5 );
    }

    public function chargeType(): string
    {
        return "hourly rate";
    }
}

class FixedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    public function chargeType(): string
    {
        return "fixed rate";
    }
}

class Lecture extends Lesson
{
    // Lecture-specific implementations ...
}

class Seminar extends Lesson
{
    // Seminar-specific implementations ...
}
*/

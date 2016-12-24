<?php
declare(strict_types=1);
namespace popp\ch08\batch02;

/* listing 08.08 */
abstract class CostStrategy
{
    abstract public function cost(Lesson $lesson): int;
    abstract public function chargeType(): string;
}
/* /listing 08.08 */

<?php
declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.08 */
interface Chargeable
{
    public function getPrice(): float;
}

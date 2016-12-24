<?php
declare(strict_types = 1);

namespace popp\ch09\batch08;

/* listing 09.20 */
abstract class ApptEncoder
{
    abstract public function encode(): string;
}

<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.04 */
interface Reader
{
    public function getChar();
    public function getPos(): int;
    public function pushBackChar();
}

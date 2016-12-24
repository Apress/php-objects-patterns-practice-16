<?php
declare(strict_types = 1);

namespace popp\ch10\batch07;

/* listing 10.29 */
abstract class ProcessRequest
{
    abstract public function process(RequestHelper $req);
}

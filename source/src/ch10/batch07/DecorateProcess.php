<?php
declare(strict_types = 1);

namespace popp\ch10\batch07;

/* listing 10.31 */
abstract class DecorateProcess extends ProcessRequest
{
    protected $processrequest;

    public function __construct(ProcessRequest $pr)
    {
        $this->processrequest = $pr;
    }
}

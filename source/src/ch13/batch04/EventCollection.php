<?php
declare(strict_types = 1);

namespace popp\ch13\batch04;

class EventCollection extends Collection
{
    public function targetClass()
    {
        return Event::class;
    }
}

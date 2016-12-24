<?php
declare(strict_types = 1);

namespace popp\ch13\batch06;

/* listing 13.36 */
class EventIdentityObject extends IdentityObject
{
    private $start = null;
    private $minstart = null;

    public function setMinimumStart(int $minstart)
    {
        $this->minstart = $minstart;
    }

    public function getMinimumStart()
    {
        return $this->minstart;
    }

    public function setStart(int $start)
    {
        $this->start = $start;
    }

    public function getStart()
    {
        return $this->start;
    }
}
/* /listing 13.36 */

<?php
declare(strict_types = 1);

namespace popp\ch13\batch06;

/* listing 13.35 */
class IdentityObject
{
    private $name = null;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
/* /listing 13.35 */

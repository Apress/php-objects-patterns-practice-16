<?php
declare(strict_types=1);

namespace popp\ch04\batch18;

/* listing 04.75 */
class PersonWriter
{

    public function writeName(Person $p)
    {
        print $p->getName() . "\n";
    }

    public function writeAge(Person $p)
    {
        print $p->getAge() . "\n";
    }
}

<?php
declare(strict_types = 1);

namespace popp\ch09\batch01;

/* listing 09.01 */
abstract class Employee
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function fire();
}

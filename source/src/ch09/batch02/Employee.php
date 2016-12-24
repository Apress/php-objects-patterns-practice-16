<?php
declare(strict_types = 1);

namespace popp\ch09\batch02;

abstract class Employee
{
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function fire();
}

<?php
declare(strict_types = 1);

namespace popp\ch09\batch03;

class NastyBoss
{
    private $employees = array();

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function projectFails()
    {
        if (count($this->employees)) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}

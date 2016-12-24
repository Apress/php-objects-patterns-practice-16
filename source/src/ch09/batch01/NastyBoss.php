<?php
declare(strict_types = 1);

namespace popp\ch09\batch01;

/* listing 09.03 */
class NastyBoss
{
    private $employees = [];

    public function addEmployee(string $employeeName)
    {
        $this->employees[] = new Minion($employeeName);
    }

    public function projectFails()
    {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}

<?php
declare(strict_types=1);

namespace popp\ch04\batch21;

/* listing 04.83 */
class Account
{
    public $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}
//done

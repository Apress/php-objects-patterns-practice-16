<?php
declare(strict_types=1);

namespace popp\ch04\batch23;

/* listing 04.89 */
class Product
{
    public $name;
    public $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}
// done

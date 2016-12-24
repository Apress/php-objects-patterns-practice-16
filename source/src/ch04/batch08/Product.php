<?php
declare(strict_types=1);

namespace popp\ch04\batch08;

class Product
{
    public $name;
    public $price;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

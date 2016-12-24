<?php
declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.09 */
class ShopProduct implements Chargeable
{
    // ...
    protected $price;
    // ...

    public function getPrice(): float
    {
        return $this->price;
    }
    // ...
}

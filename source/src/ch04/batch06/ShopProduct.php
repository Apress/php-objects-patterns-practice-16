<?php
declare(strict_types=1);

namespace popp\ch04\batch06;

/* listing 04.10 */

class ShopProduct
{
    private $taxrate = 17;

/* /listing 04.10 */

    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
    ) {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
    }

/* listing 04.10 */

// ...

    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
    }
}
/* /listing 04.10 */

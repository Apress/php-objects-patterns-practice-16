<?php
declare(strict_types=1);
namespace popp\ch03\batch14;

use popp\ch03\batch14\ShopProduct;

class BookProduct extends ShopProduct
{
    public $numPages;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages
    ) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->numPages = $numPages;
    }

    public function getNumberOfPages()
    {
        return $this->numPages;
    }

/* listing 03.43 */
    public function getSummaryLine()
    {
        $base  = parent::getSummaryLine();
        $base .= ": page count - $this->numPages";
        return $base;
    }
/* /listing 03.43 */
/* listing 03.45 */
// BookProduct

    public function getPrice()
    {
        return $this->price;
    }
/* /listing 03.45 */
}
